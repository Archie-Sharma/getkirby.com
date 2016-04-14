<?php

c::set('markdown.extra', true);
c::set('cache.driver', 'file');

c::set('routes', array(
  array(
    'pattern' => 'docs.json',
    'action'  => function() {

      $cache = new Cache\Driver\File(kirby()->roots()->cache());
      $data  = $cache->get('docs');

      if(empty($data)) {
        $data = page('docs')->index()->visible()->sortBy('title', 'asc')->toArray(function($item) {
          return array(
            'title' => $item->title()->toString(),
            'uri'   => $item->uri()
          );
        });
        $data = array_values($data);
        $cache->set('docs', $data);
      }

      return response::json($data);
    }
  ),
  array(
    'pattern' => array('(docs/cheatsheet)/(:any)/(:any)', '(docs/toolkit/api)/(:any)/(:any)'),
    'action'  => function($cheatsheet, $section, $item) {
      // set the section GET param
      // used for titles, inheritance warnings and the sidebar
      r::set('section', $cheatsheet . '/' . $section);
      
      // check if the page with the exact URL exists
      if($page = page($cheatsheet . '/' . $section . '/' . $item)) {
        return $page;
      }
      
      // try to get the cheat sheet section
      $sectionPage = page($cheatsheet . '/' . $section);
      if(!$sectionPage) return site()->errorPage();
      
      // try to get the inherited child
      $itemPage = $sectionPage->inheritedChildren()->findBy('uid', $item);
      if(!$itemPage) return site()->errorPage();
      
      return $itemPage;
    }
  ),
  array(
    'pattern' => 'docs/toolkit/generate', 
    'action'  => function() {
      
      if(c::get('documentor')) {

        $documentor = new Documentor();
        $data       = $documentor->start();

        dump($data);

      } else {
        go();
      }

    }
  ),
  array(
    'pattern' => 'docs/inspect', 
    'action'  => function() {

      if(c::get('inspector')) {

        $inspector = new Inspector();
        var_dump($inspector->results());

      } else {
        go();
      }

    }
  ),
  array(
    'pattern' => 'blog/feed', 
    'action'  => function() {
      go('feed');
    }
  ),
));

// Algolia search options
c::set('algolia.autoindex', false);
c::set('algolia.index', 'getkirby');
c::set('algolia.fields', array(
  'url',
  'template',
  'title',
  'text' => function($page) {
    return strip_tags($page->text()->kirbytext());
  }
));
c::set('algolia.templates', array(
  'docs' => array(
    'filter' => function($page) {
      return $page->isVisible();
    },
    'fields' => array('description')
  ),
  'cheatsheet.section' => array(
    'filter' => function($page) {
      return $page->isVisible();
    },
    'fields' => array(
      'url' => function($page) {
        return $page->parent()->url() . '#' . $page->uid();
      }
    )
  ),
  'cheatsheet.item' => array(
    'filter' => function($page) {
      return $page->isVisible();
    },
    'fields' => array('excerpt')
  ),
));

// Load site-specific Algolia options
if(is_file(__DIR__ . DS . 'config.algolia.php')) require_once(__DIR__ . DS . 'config.algolia.php');
