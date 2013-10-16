<?php /* Smarty version Smarty-3.1.11, created on 2012-10-04 15:00:23
         compiled from "/home/jramirezv/ccafs-climate.org/templates/form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1899400532506e06f7c4db70-39347347%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '01786a0f999bbee55ee2110ac5bc43e1c92abfcb' => 
    array (
      0 => '/home/jramirezv/ccafs-climate.org/templates/form.tpl',
      1 => 1349299932,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1899400532506e06f7c4db70-39347347',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'downloads' => 0,
    'fileType' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_506e06f7d37753_79122898',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_506e06f7d37753_79122898')) {function content_506e06f7d37753_79122898($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('jsIncludes'=>array("jquery","form","tablesorter"),'pageTitle'=>"Data Form - CCAFS Climate",'pageDescription'=>"Form to fill for downloading data from the CCAFS climate data portal.",'keywords'=>"CCAFS,registration,download"), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('current'=>"data"), 0);?>

<script>
    $selectedFiles = <?php echo $_smarty_tpl->tpl_vars['downloads']->value;?>
;
</script>
<div id="subheader-image">
    <img src="<?php echo @SMARTY_IMG_URI;?>
/ribbon_header_data.gif" />
</div>
<div id="content" class="form">
    <h3>Terms and conditions</h3>
    <hr>
    <br>
    <p>
        Please fill the following form in order to be able to download the files. All form fields are required.
    </p>
    <div id="div-form">
        <form id="contact-form" action="/ajax/user-info.php" method="GET">
            <input type="hidden" id="user-id" name="userId" value="-1" />
            <input type="hidden" id="file-type" name="file-type" value="<?php echo $_smarty_tpl->tpl_vars['fileType']->value;?>
" />
            <div class="input-form">
                <label class="label" for="email">Email:</label>
                <input id="email" name="email" type="email" />
                <button id="email-button" type="submit"><img class="button-image" src="<?php echo @SMARTY_IMG_URI;?>
/search-icon.png" />Search</button>
                <img class="ajax-loader" src="<?php echo @SMARTY_IMG_URI;?>
/ajax-loader.gif" />
                <span class="error">Please enter a valid email address.</span>

            </div>
            <fieldset id="additional-information">
                <p id="welcome-message"></p>
                <div class="input-form user-name">
                    <label class="label" for="first-name">First Name: </label>
                    <input id="first-name" type="text" name="firstName" />
                </div>
                <div class="input-form user-name">
                    <label class="label" for="last-name">Last Name: </label>
                    <input id="last-name" type="text" name="lastName"/>
                </div>
                <div class="input-form">
                    <label class="label" for="institute-name">Institute Name: </label>
                    <input id="institute-name" type="text" name="instituteName"/>
                </div>
                <div class="checkbox-form institute-regions">
                    <span class="group-label">Region(s) where your institute is located:</span>
                    <div class="check-group">
                        <input type="checkbox" id="i_africa" name="institute-regions[]" value="africa" /><label for="i_africa" class="label">Africa</label><br>
                        <input type="checkbox" id="i_asia" name="institute-regions[]" value="asia" /><label for="i_asia" class="label">Asia</label><br>
                        <input type="checkbox" id="i_oceania" name="institute-regions[]" value="oceania" /><label for="i_oceania" class="label">Australia and Oceania</label><br>
                        <input type="checkbox" id="i_central_america_caribbean" name="institute-regions[]" value="central_america_caribbean" /><label for="i_central_america_caribbean" class="label">Central America and the Caribbean</label><br>
                        <input type="checkbox" id="i_europe" name="institute-regions[]" value="europe" /><label for="i_europe" class="label">Europe</label><br>
                        <input type="checkbox" id="i_middle_east_north_africa" name="institute-regions[]" value="middle_east_north_africa" /><label for="i_middle_east_north_africa" class="label">Middle East and North Africa</label><br>
                        <input type="checkbox" id="i_north_america" name="institute-regions[]" value="north_america" /><label for="i_north_america" class="label">North America</label><br>
                        <input type="checkbox" id="i_south_america" name="institute-regions[]" value="south_america" /><label for="i_south_america" class="label">South America</label><br>
                    </div>
                </div>
                <div class="checkbox-form research-regions">
                    <span class="group-label">Region(s) of your research interest:</span>
                    <div class="check-group">
                        <input type="checkbox" id="r_africa" name="research-regions[]" value="africa" /><label for="r_africa" class="label">Africa</label><br>
                        <input type="checkbox" id="r_asia" name="research-regions[]" value="asia" /><label for="r_asia" class="label">Asia</label><br>
                        <input type="checkbox" id="r_oceania" name="research-regions[]" value="oceania" /><label for="r_oceania" class="label">Australia and Oceania</label><br>
                        <input type="checkbox" id="r_central_america_caribbean" name="research-regions[]" value="central_america_caribbean" /><label for="r_central_america_caribbean" class="label">Central America and the Caribbean</label><br>
                        <input type="checkbox" id="r_europe" name="research-regions[]" value="europe" /><label for="r_europe" class="label">Europe</label><br>
                        <input type="checkbox" id="r_middle_east_north_africa" name="research-regions[]" value="middle_east_north_africa" /><label for="r_middle_east_north_africa" class="label">Middle East and North Africa</label><br>
                        <input type="checkbox" id="r_north_america" name="research-regions[]" value="north_america" /><label for="r_north_america" class="label">North America</label><br>
                        <input type="checkbox" id="r_south_america" name="research-regions[]" value="south_america" /><label for="r_south_america" class="label">South America</label><br>
                    </div>
                </div>
                <div class="text-area-form">
                    <label for="use">Intended use of the data:</label>
                    <textarea id="use" name="use" cols="40" rows="5" ></textarea>
                </div>
                <p id="disclaimer">
                    Submitting this information constitutes acceptance of our intellectual property policy and <a href="<?php echo @SMARTY_DOCS_URI;?>
/GCM_Data_Portal_Disclaimer.pdf">disclaimers</a>.
                </p>
                <div class="submit-button">
                    <button id="submit-user-info" type="submit">Submit</button>
                    <img id="ajax-loader" src="<?php echo @SMARTY_IMG_URI;?>
/ajax-loader.gif" />
                    <span id="message"></span>
                </div>
            </fieldset>
        </form>
    </div>
    <div id="download-files">
        <p>The following links will be available for <?php echo @LINK_DAYS;?>
 days.</p>
        <table id="download-table" class="tablesorter">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>File</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>