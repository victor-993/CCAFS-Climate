{include file='head.tpl' jsIncludes=["jquery", "file-list", "tablesorter"] pageTitle="File List - CCAFS Climate" pageDescription="List of files available for download from CCAFS data portal." keywords="files,download,CCAFS"}
{include file='header.tpl' current="data"}
<div id="subheader-image">
    <img src="{$smarty.const.SMARTY_IMG_URI}/ribbon_header_data.gif" />
</div>
<div id="content" class="file-list" >
    <h3>File List</h3>
    <hr>
    <p>
        Please select one or more files you want to download.
    </p>    

    <form id="files-form" action="/form.php" method="POST">
	   <input type="hidden" id="fileSet" name="fileSet" value="{$fileSet}" />
      <button id="download-button-top" class="download-button" type="submit" disabled="disabled">Generate Download Links</button>
		<span id="filesFound" style="	float:	right">{$count} files found</span>
        <table id="files-table" class="tablesorter">
            <thead id="headTableFiles">
                <tr>
					{foreach from=$files item=file} 
					{/foreach}
					{if "{$file["availability_id"]}" == "2"}
						<th style="width: 75px;"><input type="checkbox" id="check-all"/>Select All</th>
					{else}
						<th style="width: 75px;"><input type="checkbox" id="check-all" disabled="disabled"/>Select All</th> 
					{/if}

                    <th style="width: 395px;">File Name</th>
                    <th style="width: 205px;">File Set</th>
                    <th style="width: 91px;">Status*</th>
                </tr>
            </thead>
            <tbody id="bodyTableFiles">

                {foreach from=$files item=file}

                    <tr>
                        <td style="width: 77px;">
                            {* Checkbox is shown only if the file is available *}
                            {if $file.availability_id == "2"}
                                <input class="checkbox-file" type="checkbox" name="download-files[]" value="{$file["id"]}" />
                            {else}
                                <input class="checkbox-file" type="checkbox" disabled="disabled" />
                            {/if}
                        </td>
                        <td style="width: 397px;">{$file.name}</td>
                        <td style="width: 207px;">{$file.fileset}</td>
                        <td style="width: 93px;">{$file.availability}</td>

                    </tr>
                {/foreach}

            </tbody>
        </table>
        <input type="hidden" name="file-type" value="file" />
        <button id="download-button-bottom" class="download-button" type="submit" disabled="disabled">Generate Download Links</button>
    </form>
	
    <p>
        <h4>*Status:</h4>
		<ul>
			<li>Available: data is available online.</li>
			<li>Deprecated: data is old and only available by request. Go to <a href="https://www.ccafs-climate.org/contact/">contact</a> page.</li>		
			<li>In production: data is in production and will be available soon.</li>
		</ul>
    </p>  	
	<br>
</div>
{include file='footer.tpl'}
