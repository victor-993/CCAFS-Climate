<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" dir="ltr" xmlns="http://www.w3.org/1999/xhtml">
    <head profile="http://gmpg.org/xfn/11">
        <title>{$pageTitle|default:'CCAFS Climate'}</title>
        <meta content="text/html; charset=UTF-8" http-equiv="content-type" />
        <meta name="description" content="{$pageDescription|default:'GCM Data Portal'}" />
        <meta name="keywords" content="{$keywords|default:'GCM,CIAT'}" />
        <meta name="robots" content="index, follow, archive" />
        <meta name="googlebot" content="index" />
        <!-- Stylesheets -->
        <!-- Main -->
        <link rel="stylesheet" type="text/css" href="{$smarty.const.SMARTY_CSS_URI}/main.css" media="screen" />
        <!-- include specified javascripts -->
        {foreach from=$jsIncludes item=jsToInclude}
            {if $jsToInclude == "jquery"}
                <script src="{$smarty.const.SMARTY_JS_URI}/jquery/jquery-1.8.1.min.js"></script>
            {elseif $jsToInclude == "index"}
                <script src="{$smarty.const.SMARTY_JS_URI}/index.js"></script>
            {elseif $jsToInclude == "downscaling"}
                <script src="{$smarty.const.SMARTY_JS_URI}/downscaling.js"></script>
            {elseif $jsToInclude == "pattern_scaling"}
                <script src="{$smarty.const.SMARTY_JS_URI}/pattern_scaling.js"></script>
            {elseif $jsToInclude == "data"}
                <script src="{$smarty.const.SMARTY_JS_URI}/data.js"></script>
            <!-- TEMPORAL OPTION -->
            {elseif $jsToInclude == "data2"}
                <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key={$smarty.const.GOOGLE_API_KEY}&sensor=false"></script>
                <script src="{$smarty.const.SMARTY_JS_URI}/data2.js"></script>
            {elseif $jsToInclude == "bpopup"}
                <!-- Reference http://dinbror.dk/bpopup/ -->
                <script src="{$smarty.const.SMARTY_JS_URI}/bpopup/jquery.bpopup-0.7.0.min.js"></script>
            {elseif $jsToInclude == "tiptip"}
                <!-- Reference: http://code.drewwilson.com/entry/tiptip-jquery-plugin -->
                <script src="{$smarty.const.SMARTY_JS_URI}/TipTip-v1.3/jquery.tipTip.minified.js"></script>
                <link rel="stylesheet" type="text/css" href="{$smarty.const.SMARTY_CSS_URI}/tipTip.css" />
            {elseif $jsToInclude == "form"}
                <script src="{$smarty.const.SMARTY_JS_URI}/form.js"></script>
            {elseif $jsToInclude == "file-list"}
                <script src="{$smarty.const.SMARTY_JS_URI}/file-list.js"></script>
            {elseif $jsToInclude == "tablesorter"}
                <link rel="stylesheet" type="text/css" href="{$smarty.const.SMARTY_CSS_URI}/tablesorter.css" />
                <script src="{$smarty.const.SMARTY_JS_URI}/tablesorter/jquery.tablesorter.min.js"></script>
            {/if}
        {/foreach}

    </head>

    <body>