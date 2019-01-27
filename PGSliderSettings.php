<?php


class PGSliderSettings {

	public function addMenu(){
		add_action('admin_menu', [self::class, 'pg_plugin_settings']);
	}

	public function pg_plugin_settings() {
		//create a new top-level menu
		add_menu_page('Pegasus Slider Settings', 'Pegasus Slider Settings', 'administrator', 'pg_settings', [self::class, 'pg_display_settings']);
	}

	public function pg_display_settings() {
        $draggable = get_option('pg_draggable') ?: 'true';
        $autoplay = get_option('pg_autoplay') ?: 'true';
        $pauseOnHover = get_option('pg_autoplaypauseonover') == 'true' ? 'true' : 'false';
        $cellAlign = get_option('pg_cellalign') ?: 'center';
        $adaptiveHeight = get_option('pg_adaptiveheight') ?: 'false';
        $contain = get_option('pg_contain') ?: 'true';
        $groupCells = get_option('pg_groupcells') ?: 'false';

        $html = '<div class="wrap">
            <form method="post" name="options" action="options.php">
            <h2>Update Slider Settings</h2>' . wp_nonce_field('update-options') . '
            <table width="100%" cellpadding="10" class="form-table">
                <tr>
                    <td align="left" scope="row">
                    <label>Draggable </label>
                    <select name="pg_draggable" >
                      <option value="'.$draggable.'">'.$draggable.'</option>
                      <option value="true">Enable</option>
                      <option value="false">Disable</option>
                    </select>
                    </td> 
                </tr>
                <tr>
                    <td align="left" scope="row">
                    <label>Contain </label>
                    <select name="pg_contain" >
                      <option value="'.$contain.'">'.$contain.'</option>
                      <option value="true">True</option>
                      <option value="false">False</option>
                    </select>
                    </td> 
                </tr>
                <tr>
                    <td align="left" scope="row">
                    <label>Group Cells </label>
                    <select name="pg_groupcells" >
                      <option value="'.$groupCells.'">'.$groupCells.'</option>
                      <option value="true">Enable</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="25%">25%</option>
                      <option value="50%">50%</option>
                      <option value="75%">75%</option>
                    </select>
                    </td> 
                </tr>
                <tr>
                    <td align="left" scope="row">
                    <label>Enable Auto Play</label>
                    <select name="pg_autoplay" >
                       <option value="'.$autoplay.'">'.$autoplay.'</option>
                      <option value="true">Every 3 Seconds</option>
                      <option value="false">Disable</option>
                      <option value="1500">1500 milliseconds</option>
                      <option value="2000">2000 milliseconds</option>
                      <option value="3000">3000 milliseconds</option>
                      <option value="5000">5000 milliseconds</option>
                    </select>
                    </td> 
                </tr>
                <tr>
                    <td align="left" scope="row">
                        <label>Pause On Mouse Over </label>
                        <select name="pg_autoplaypauseonover" >
                         <option value="'.$pauseOnHover.'">'.$pauseOnHover.'</option>
                          <option value="true">True</option>
                          <option value="false">False</option>
                        </select>
                    </td> 
                </tr>
                <tr>
                    <td align="left" scope="row">
                       <label>Cell Alignment </label>
                        <select name="pg_cellalign" >
                         <option value="'.$cellAlign.'">'.$cellAlign.'</option>
                          <option value="left">Left</option>
                          <option value="right">Right</option>
                          <option value="center">Center</option>
                        </select>
                    </td> 
                </tr>
                 <tr>
                    <td align="left" scope="row">
                    <label>Adaptive Height </label>
                    <select name="pg_adaptiveheight" >
                      <option value="'. $adaptiveHeight .'">'.$adaptiveHeight.'</option>
                      <option value="true">True</option>
                      <option value="false">False</option>
                    </select>
                    </td> 
                </tr>
            </table>
            <p class="submit">
                <input type="hidden" name="action" value="update" />  
                <input type="hidden" name="page_options" value="pg_draggable,pg_autoplay,pg_autoplaypauseonover,pg_cellalign,pg_adaptiveheight,pg_contain,pg_contain,pg_groupcells" /> 
                <input type="submit" name="Submit" value="Update Settings" />
            </p>
            </form>

        </div>';
		echo $html;
	}
}