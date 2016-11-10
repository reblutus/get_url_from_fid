<?php
namespace Drupal\get_url_from_fid;

class GetUrlFromFid extends \Twig_Extension{

  /**
   * {@inheritdoc}
   * This function must return the name of the extension. It must be unique.
   */
  public function getName(){
    return 'get_url_from_fid';
  }

  /**
   * In this function we can declare the extension function
   */
  public function getFunctions(){
    return array(
      new \Twig_SimpleFunction('get_url_from_fid',
        array($this, 'get_url_from_fid'),
        array('is_safe' => array('html'))
      )
    );
  }

  public function get_url_from_fid($fid){
    $file = \Drupal\file\Entity\File::load($fid);
    $uri = $file->getFileUri();
    return file_create_url($uri);
  }
}
