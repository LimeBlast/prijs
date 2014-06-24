<?php

/**
 * Not used for anything right now, but can contain useful functions as helpers
 */

/**
 * Provides a link to the profile. If $text is specified, will be used as the link text, otherwise the username will be used
 * @param string $text
 * @param array $attributes
 * @return string
 */
function link_to_profile($text = '', $attributes = array())
{
	$text = ($text == '') ? Auth::user()->username : $text;
	return link_to_route('profiles.show', $text, Auth::user()->username, $attributes);
}