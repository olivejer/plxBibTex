<?php if(!defined('PLX_ROOT')) exit; ?>

<?php

# Control du token du formulaire
plxToken::validateFormToken($_POST);

if(!empty($_POST)) {
	$plxPlugin->setParam('file_path', $_POST['file_path'], 'string');
	
	$plxPlugin->setParam('authorshighlight', $_POST['authorshighlight'], 'string');
	
	$plxPlugin->setParam('authorsfilter', $_POST['authorsfilter'], 'string');
	
	$plxPlugin->setParam('authorsnumber', $_POST['authorsnumber'], 'numeric');
	
	if(isset($_POST['group']))
		$plxPlugin->setParam('group', '1', 'numeric');
	else
		$plxPlugin->setParam('group', '0', 'numeric');
		
	if(isset($_POST['ref']))
	{
	$plxPlugin->setParam('allreferences', '0', 'numeric');
	
	if(isset($_POST['ref']['article']))
		$plxPlugin->setParam('article', '1', 'numeric');
	else
		$plxPlugin->setParam('article', '0', 'numeric');
	
	if(isset($_POST['ref']['manual']))
		$plxPlugin->setParam('manual', '1', 'numeric');
	else
		$plxPlugin->setParam('manual', '0', 'numeric');
		
	if(isset($_POST['ref']['_unknown']))
		$plxPlugin->setParam('_unknown', '1', 'numeric');
	else
		$plxPlugin->setParam('_unknown', '0', 'numeric');
		
	if(isset($_POST['ref']['book']))
		$plxPlugin->setParam('book', '1', 'numeric');
	else
		$plxPlugin->setParam('book', '0', 'numeric');
		
	if(isset($_POST['ref']['mastersthesis']))
		$plxPlugin->setParam('mastersthesis', '1', 'numeric');
	else
		$plxPlugin->setParam('mastersthesis', '0', 'numeric');
		
	if(isset($_POST['ref']['unpublished']))
		$plxPlugin->setParam('unpublished', '1', 'numeric');
	else
		$plxPlugin->setParam('unpublished', '0', 'numeric');
		
	if(isset($_POST['ref']['booklet']))
		$plxPlugin->setParam('booklet', '1', 'numeric');
	else
		$plxPlugin->setParam('booklet', '0', 'numeric');
		
	if(isset($_POST['ref']['misc']))
		$plxPlugin->setParam('misc', '1', 'numeric');
	else
		$plxPlugin->setParam('misc', '0', 'numeric');
		
	if(isset($_POST['ref']['inproceedings']))
		$plxPlugin->setParam('inproceedings', '1', 'numeric');
	else
		$plxPlugin->setParam('inproceedings', '0', 'numeric');
		
	if(isset($_POST['ref']['conference']))
		$plxPlugin->setParam('conference', '1', 'numeric');
	else
		$plxPlugin->setParam('conference', '0', 'numeric');
		
	if(isset($_POST['ref']['phdthesis']))
		$plxPlugin->setParam('phdthesis', '1', 'numeric');
	else
		$plxPlugin->setParam('phdthesis', '0', 'numeric');
		
	if(isset($_POST['ref']['techreport']))
		$plxPlugin->setParam('techreport', '1', 'numeric');
	else
		$plxPlugin->setParam('techreport', '0', 'numeric');
		
	if(isset($_POST['ref']['inbook']))
		$plxPlugin->setParam('inbook', '1', 'numeric');
	else
		$plxPlugin->setParam('inbook', '0', 'numeric');
		
	if(isset($_POST['ref']['incollection']))
		$plxPlugin->setParam('incollection', '1', 'numeric');
	else
		$plxPlugin->setParam('incollection', '0', 'numeric');
		
	if(isset($_POST['ref']['proceedings']))
		$plxPlugin->setParam('proceedings', '1', 'numeric');
	else
		$plxPlugin->setParam('proceedings', '0', 'numeric');
	}
	else
	{
	$plxPlugin->setParam('conference', '0', 'numeric');
	$plxPlugin->setParam('phdthesis', '0', 'numeric');
	$plxPlugin->setParam('article', '0', 'numeric');
	$plxPlugin->setParam('inbook', '0', 'numeric');
	$plxPlugin->setParam('techreport', '0', 'numeric');
	$plxPlugin->setParam('incollection', '0', 'numeric');
	$plxPlugin->setParam('inproceedings', '0', 'numeric');
	$plxPlugin->setParam('proceedings', '0', 'numeric');
	$plxPlugin->setParam('misc', '0', 'numeric');
	$plxPlugin->setParam('booklet', '0', 'numeric');
	$plxPlugin->setParam('book', '0', 'numeric');
	$plxPlugin->setParam('unpublished', '0', 'numeric');
	$plxPlugin->setParam('_unknown', '0', 'numeric');
	$plxPlugin->setParam('manual', '0', 'numeric');
	$plxPlugin->setParam('mastersthesis', '0', 'numeric');
	$plxPlugin->setParam('allreferences', '1', 'numeric');
	}
				
		

	if(isset($_POST['groupyear']))
		$plxPlugin->setParam('groupyear', '1', 'numeric');
	else
		$plxPlugin->setParam('groupyear', '0', 'numeric');
		
	$plxPlugin->saveParams();
	header('Location: parametres_plugin.php?p=plxBibTex');
	exit;
}
?>
<script>
	function check(id,value) 
	{ 
			document.getElementById(id).checked=value;
	}
	
	function checkall(value) 
	{	
		var checkboxes = new Array(
		'ref_article',
		'ref_manual',
		'ref_unknown',
		'ref_book',
		'ref_mastersthesis',
		'ref_unpublished',
		'ref_booklet',
		'ref_misc',
		'ref_inproceedings',
		'ref_conference',
		'ref_phdthesis',
		'ref_techreport',
		'ref_inbook',
		'ref_proceedings',
		'ref_incollection'
		);
		var index;
		for (index = 0; index < checkboxes.length; ++index) {
			check(checkboxes[index],value);
			}
	}
	
</script>
<h2><?php echo $plxPlugin->lang('L_TITLE_CONFIG') ?></h2>
<h3><?php $plxPlugin->lang('L_DESCRIPTION'); ?></h3>
</br>

<form action="parametres_plugin.php?p=plxBibTex" method="post">
	<fieldset>
		<p class="field"><label for="file_path"><?php $plxPlugin->lang('L_FILE_PATH'); ?> : </label></p>
		<input type="text" name="file_path" value="<?php echo plxUtils::strCheck($plxPlugin->getParam('file_path')) ?>" />
		&nbsp;<?php $plxPlugin->lang('L_FILE_PATH_EX'); ?>
		<p class="field"><label for="authorsfilter"><?php $plxPlugin->lang('L_AUTHORS_FILTER'); ?> : </label></p>
		<input type="text" name="authorsfilter" value="<?php echo plxUtils::strCheck($plxPlugin->getParam('authorsfilter')) ?>" />
		&nbsp;<?php $plxPlugin->lang('L_AUTHORS_HIGHLIGHT_EX'); ?>
		<p class="field"><label for="authorshighlight"><?php $plxPlugin->lang('L_AUTHORS_HIGHLIGHT'); ?> : </label></p>
		<input type="text" name="authorshighlight" value="<?php echo plxUtils::strCheck($plxPlugin->getParam('authorshighlight')) ?>" />
		&nbsp;<?php $plxPlugin->lang('L_AUTHORS_HIGHLIGHT_EX'); ?>
		<p class="field"><label for="authorsnumber"><?php $plxPlugin->lang('L_AUTHORS_NUMBER'); ?> : </label></p>
		<input type="number" min ="1" name="authorsnumber" value="<?php echo plxUtils::strCheck($plxPlugin->getParam('authorsnumber')) ?>" />
		&nbsp;<?php $plxPlugin->lang('L_AUTHORS_NUMBER_EX'); ?>
		
		<p class="field">
		<label for="ref"><?php $plxPlugin->lang('L_CHOICES'); ?></label></p>
		<table class="table" style="width:600px;margin-left:10px">
	<thead>
		<tr>
			<th colspan="3" style="width:90px; text-align:left;"><a href="#" onClick="checkall(true);"><?php $plxPlugin->lang('L_ALL'); ?></a></th>
			<th colspan="3" style="width:90px; text-align:right;"><a href="#"  onClick="checkall(false);"><?php $plxPlugin->lang('L_NONE'); ?></a></th>
		</tr>
	</thead>
		<tbody>
			<tr class="line-1">
				<td><input type="checkbox" <? if ($plxPlugin->getParam('article') == 1) echo "checked=\"checked\""; ?>  id="ref_article" name="ref[article]" value="article"></td>
				<td><?php $plxPlugin->lang('L_ARTICLE'); ?></td>
				<td><input type="checkbox" <? if ($plxPlugin->getParam('manual') == 1) echo "checked=\"checked\""; ?>  id="ref_manual" name="ref[manual]" value="manual"></td>
				<td><?php $plxPlugin->lang('L_MANUAL'); ?></td>
				<td><input type="checkbox" <? if ($plxPlugin->getParam('_unknown') == 1) echo "checked=\"checked\""; ?>  id="ref_unknown" name="ref[_unknown]" value="_unknown"></td>
				<td ><?php $plxPlugin->lang('L_UNKNOWN'); ?></td>
			</tr>
			<tr class="line-0">
				<td><input type="checkbox" <? if ($plxPlugin->getParam('book') == 1) echo "checked=\"checked\""; ?>  id="ref_book" name="ref[book]" value="book"></td>
				<td><?php $plxPlugin->lang('L_BOOK'); ?></td>
				<td><input type="checkbox" <? if ($plxPlugin->getParam('mastersthesis') == 1) echo "checked=\"checked\""; ?>  id="ref_mastersthesis" name="ref[mastersthesis]" value="mastersthesis"></td>
				<td><?php $plxPlugin->lang('L_MASTERTHESIS'); ?></td>
				<td><input type="checkbox" <? if ($plxPlugin->getParam('unpublished') == 1) echo "checked=\"checked\""; ?>  id="ref_unpublished" name="ref[unpublished]" value="unpublished"></td>
				<td><?php $plxPlugin->lang('L_UNPUBLISHED'); ?></td>
			</tr>
			<tr class="line-1">
				<td><input type="checkbox" <? if ($plxPlugin->getParam('booklet') == 1) echo "checked=\"checked\""; ?>  id="ref_booklet" name="ref[booklet]" value="booklet"></td>
				<td><?php $plxPlugin->lang('L_BOOKLET'); ?></td>
				<td><input type="checkbox" <? if ($plxPlugin->getParam('misc') == 1) echo "checked=\"checked\""; ?>  id="ref_misc" name="ref[misc]" value="misc"></td>
				<td><?php $plxPlugin->lang('L_MISC'); ?></td>
				<td><input type="checkbox" <? if ($plxPlugin->getParam('inproceedings') == 1) echo "checked=\"checked\""; ?>  id="ref_inproceedings" name="ref[inproceedings]" value="inproceedings"></td>
				<td><?php $plxPlugin->lang('L_INPROCEEDINGS'); ?></td>
			</tr>
			<tr class="line-0">
				<td><input type="checkbox" <? if ($plxPlugin->getParam('conference') == 1) echo "checked=\"checked\""; ?>  id="ref_conference" name="ref[conference]" value="conference"></td>
				<td><?php $plxPlugin->lang('L_CONFERENCE'); ?></td>
				<td><input type="checkbox" <? if ($plxPlugin->getParam('phdthesis') == 1) echo "checked=\"checked\""; ?>  id="ref_phdthesis" name="ref[phdthesis]" value="phdthesis"></td>
				<td><?php $plxPlugin->lang('L_PHDTHESIS'); ?></td>
				<td><input type="checkbox" <? if ($plxPlugin->getParam('techreport') == 1) echo "checked=\"checked\""; ?>  id="ref_techreport" name="ref[techreport]" value="techreport"></td>
				<td><?php $plxPlugin->lang('L_TECHREPORT'); ?></td>
			</tr>
			<tr class="line-1">
				<td><input type="checkbox" <? if ($plxPlugin->getParam('inbook') == 1) echo "checked=\"checked\""; ?>  id="ref_inbook" name="ref[inbook]" value="inbook"></td>
				<td><?php $plxPlugin->lang('L_INBOOK'); ?></td>
				<td><input type="checkbox" <? if ($plxPlugin->getParam('proceedings') == 1) echo "checked=\"checked\""; ?>  id="ref_proceedings" name="ref[proceedings]" value="proceedings"></td>
				<td><?php $plxPlugin->lang('L_PROCEEDINGS'); ?></td>
				<td><input type="checkbox" <? if ($plxPlugin->getParam('incollection') == 1) echo "checked=\"checked\""; ?>  id="ref_incollection" name="ref[incollection]" value="incollection"></td>
				<td><?php $plxPlugin->lang('L_INCOLLECTION'); ?></td>
			</tr>

		</tbody>
	</table>
		<p class="field"><i><?php $plxPlugin->lang('L_NONE_DESC'); ?></i></p>
		<p class="field"><label for="group"><?php $plxPlugin->lang('L_GROUP'); ?> : </label></p>
		<input type="checkbox" <? if ($plxPlugin->getParam('group') == 1) echo "checked=\"checked\""; ?> id="group" name="group" value="group">
		<p class="field"><label for="groupyear"><?php $plxPlugin->lang('L_GROUPYEAR'); ?> : </label></p>
		<input type="checkbox" <? if ($plxPlugin->getParam('groupyear') == 1) echo "checked=\"checked\""; ?> id="groupyear" name="groupyear" value="groupyear">
		
		<p>
			<?php echo plxToken::getTokenPostMethod() ?>
			<input type="submit" name="submit" value="<?php $plxPlugin->lang('L_SAVE'); ?>" />
		</p>
	</fieldset>
</form>
