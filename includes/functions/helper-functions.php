<?php

/**
 * @param string $color
 * @param string $height
 *
 * @return string
 */
function line_color_change( string $color, string $height = '1px',  ): string {
	return "<div style='width:100%;border-bottom:$height solid $color;height:3px;margin:15px 0'></div>";
}