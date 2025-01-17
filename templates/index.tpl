{include file='head.tpl' jsIncludes=['jquery', 'index'] pageTitle="CCAFS Climate" pageDescription="Climate change downscaled data portal provided by CIAT and CCAFS." keywords="downscaling,GCM,climate change,CIAT,CCAFS"}
{include file='header.tpl' current="home"}

<div id="content" class="home" class="main_section">
	<p style="background:#ffdd57; color: rgba(0, 0, 0, 0.7); padding: 10px; font-size: 15px;">
			<b>News:</b> When citing the CCAFS-Climate Statistically Downscaled Delta Method data please cite our new paper: 
			Navarro-Racines, C., Tarapues, J., Thornton, P., Jarvis, A., and Ramirez-Villegas, J. 2020. High-resolution and bias-corrected CMIP5 projections for climate change impact assessments. Sci Data 7, 7, <a href="https://doi.org/10.1038/s41597-019-0343-8" target="_blank">doi:10.1038/s41597-019-0343-8</a>
	</p>
	<div class="main_section">
	  <table id="sections" align="centre">
		<tbody>
		  <tr>
		  <!--
			<td align="center">
			  <a href="/data/">
				<div id="section">
				  <img class="color" src="{$smarty.const.SMARTY_IMG_URI}/icon_data.png">
				</div>
			  </a>
			</td>	-->	  
			<td>
			  <a href="/downscaling/">
				<div id="section">
				  <img class="color" src="{$smarty.const.SMARTY_IMG_URI}/1_SpatialDownscaling.png">
				</div>
			  </a>
			</td>
			<td>
			  <a href="/climatewizard/">
				<div id="section">
				  <img class="color" src="{$smarty.const.SMARTY_IMG_URI}/menu-10.png">
				</div>
			  </a>
			</td>			
			<td>
			  <a href="/bias_correction/">
				<div id="section">
				  <img class="color" src="{$smarty.const.SMARTY_IMG_URI}/menu_bias-01.png">
				</div>
			  </a>
			</td>			
			<td>
			  <a href="/methods/">
				<div id="section">
				  <img class="color" src="{$smarty.const.SMARTY_IMG_URI}/menu_index-08.png" />
				</div>
			  </a>
			</td>

				
			


			<td>
			  <a href="/documentation/">
				<div id="section">
				  <img class="color" src="{$smarty.const.SMARTY_IMG_URI}/icon_docs.png">
				</div>
			  </a>
			</td>
			<!--
			<td>
			  <a href="/links/">
				<div id="section">
				  <img class="color" src="{$smarty.const.SMARTY_IMG_URI}/icon_links.png">
				</div>
			  </a>
			</td>-->
			<td>
			  <a href="/citations/">
				<div id="section">
				  <img class="color" src="{$smarty.const.SMARTY_IMG_URI}/icon_citations.png">
				</div>
			  </a>
			</td>
			<!--
			<td>
			  <a href="/contact/">
				<div id="section">
				  <img class="color" src="{$smarty.const.SMARTY_IMG_URI}/icon_contact.png">
				</div>
			  </a>
			</td>-->
		  </tr>
		</tbody>
	  </table>
	</div> 
  <div id="content-description">
    <h4>Data Provided by the CGIAR Research Program on Climate Change, Agriculture and Food Security (CCAFS)</h4>
    <p>
      The data distributed here are in ARC GRID, and ARC ASCII format, in decimal degrees and datum WGS84.
	  CCAFS and its partners have processed this data to provide seamless continuous future climate surfaces. 
      Users should acknowledge CCAFS as the source used in the creation of any reports, publications, new data sets, derived products, or services resulting from the use of this data set.
      For commercial access to the data, send requests to <a href="mailto:a.jarvis@cgiar.org">Andy Jarvis</a> at the International Center for Tropical Agriculture (CIAT).
    </p>
    <p>
      These open-access datasets are hosted by <a href="http://aws.amazon.com/datasets/0241269495883982" target="_blank">Amazon Web Services</a>.
    </p>
    <p>
    <a rel="license" href="http://creativecommons.org/licenses/by/4.0/"><img alt="Creative Commons License" style="border-width:0" src="https://i.creativecommons.org/l/by/4.0/88x31.png" /></a><br />This work by <a xmlns:cc="http://creativecommons.org/ns#" href="https://www.ccafs-climate.org/" property="cc:attributionName" rel="cc:attributionURL">https://www.ccafs-climate.org/</a> is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by/4.0/">Creative Commons Attribution 4.0 International License</a>
    </p>
  </div>
</div>
<div class="remodal" style="display:none;" data-remodal-id="modal" data-remodal-options='{ "hashTracking": false }'>
  <div id="whatisamkn" class="modal"> 
    <div class="modal-first modal-whatis">
      <h2><strong>What is CCAFS-Climate?</strong></h2>
      <p>
        The CCAFS-Climate data portal provides global and regional future high-resolution climate datasets that serve as a basis for assessing the climate change impacts and adaptation in a variety of fields including biodiversity, agricultural and livestock production, and ecosystem services and hydrology.
      </p>
    </div>
    <h2><strong>Uses of CCAFS-Climate data</strong></h2>

    <div class="profiles-container">

      <div class="profile-detail">
        <div class="profile-detail-1">
			<table class="profile-detail_table" border="0" cellspacing="0" cellpadding="0" width="100%">
			  <tr>
				<td width="30%">
				  <div class="icon-container-d1" title="<ul>
					   <li>Policy making, food security, and adaptation planning</li><li>Assessing / enhancing agricultural practices.
					   </li><li>The informing of crop insurance policy development 
					   </li><li>Inform agricultural investment prioritization 
					   </li><li>Food security assessment.
					   </li><li>Vulnerability assessment especially in developing countries.
					   </li></ul>">
					<div class="topic-02 icon-c">
					</div>
					<div class="icon-text-c">
					  Agriculture
					</div>
				  </div>		
				</td>
				<td width="30%">
				  <div class="icon-container-d1" title="<ul>
					   <li>Prioritize conservation efforts, for policy and planning in national parks/wildlife reserves and by municipalities
					   </li>
					   <li>Prioritization of conservation efforts</li>
					   </ul>">
					<div class="topic-09 icon-c">
					</div>
					<div class="icon-text-c">
					  Biodiversity & Genetic
					</div>
				  </div>		
				</td>
				<td width="30%">
				  <div class="icon-container-d1" title="<ul><li>Understanding downscaled climate modeling in order to create more robust impact assessments</li></ul>">
					<div class="topic-04 icon-c">
					</div>
					<div class="icon-text-c">
					  Agro-climatology
					</div>
				  </div>		
				</td>
				<td width="30%">
				  <div class="icon-container-d1" title="<ul>
					   <li>Policy making, food security, and adaptation planning</li>
					   <li>Custom analyses for specific places to support adaptation planning</li>
					   <li>The informing of water policy development</li>
					   <li>Land-use planning</li>
					   <li>Adaptative capacity enhancement in developing countries</li>
					   </ul>">
					<div class="topic-05 icon-c">
					</div>
					<div class="icon-text-c">
					  Ecosystem functioning
					</div>
				  </div>		
				</td>
				<td width="30%">
				  <div class="icon-container-d1" title="<ul>
					   <li>Capacity building / Academia (teaching, Master, PhD)
					   </li>
					   </ul>">
					<div class="topic-08 icon-c">
					</div>
					<div class="icon-text-c">
					  Teaching and demonstrating
					</div>
				  </div>		
				</td>
			  </tr>
			</table>	  
        </div>
      </div>
    </div>	
	
	
	<div>
		<div id="info" class="left">
		  <p class="moreInfo">For more information on CCAFS-Climate, visit the <a href="/about/">About</a> page.</p>
		  <p class="moreInfo"><a href="https://doi.org/10.1038/s41597-019-0343-8" target="_blank">Check our new article: High-resolution and bias-corrected CMIP5 projections for climate change impact assessments</a></p>
		  <p class="chkmsg"><input type="checkbox" id="chk_showmsg">&nbsp;Don't show this message again</p>
		</div>
	
		<div class="buttons">
		  <div class="buttons-c">
			<a id="goback1" class="gotoclimate" style="display:none">Back</a>
			<a id="goback" class="gotoclimate" style="display:none">Back</a>
			<a id="gotoclimate" class="gotoclimate">Return to Website</a>
		  </div>
		</div>
	 </div>
	
  </div>

</div>
{include file='footer.tpl'}
