<?php
/**
 * Displays a gravatar image for a given email
 *
 * @param string  $email            Email of the gravatar
 * @param string  $gravatar_rating  Maximal rating of the gravatar
 * @param integer $gravatar_size    size of the gravatar
 * @param string  $alt_text         Alternative text
 * @return string
 * @see http://site.gravatar.com/site/implement#section_1_1
 */
function gravatar_image_tag($email, $gravatar_rating = null, $gravatar_size = null, $alt_text = 'Gravatar photo')
{
  return image_tag(gravatar_image_path($email, $gravatar_size, $gravatar_rating), array(
    'alt' => $alt_text,
    'width' => sfConfig::get('app_gravatar_default_size', 80),
    'height' => sfConfig::get('app_gravatar_default_size', 80),
    'class' => 'gravatar_photo'
  ));
}

/**
 * Returns the image path to a gravatar image
 *
 * @param  string  $email  The email address for the gravatar
 * @param  integer $size  The size of the image to be downloaded and cached
 * @param  string $rating  The rating of the image to fetch
 * @return string
 */
function gravatar_image_path($email, $size = null, $rating = null)
{
  $gravatar = new GravatarApi($size, $rating);

  return $gravatar->getGravatar($email);
}