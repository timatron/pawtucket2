<div class="container">
	<div class="row">
		<div class="col-sm-5">
			<div class="scaleImg">
<?php
	$va_man_images = array("manuscript1.jpg", "manuscript2.jpg", "manuscript3.jpg", "manuscript4.jpg", "manuscript5.jpg", "manuscript6.jpg");
	$vn_key = array_rand($va_man_images);
	print caGetThemeGraphic($this->request, $va_man_images[$vn_key])
?>
			</div>
		</div>
		<div class="col-sm-7">

{{{form}}}

	<div class='advancedContainer'>
		<h1>Search Manuscript Database</h1>
		<div class='row'>
			<div class="advancedSearchField col-sm-12 col-md-8">
				<span class='formLabel' data-toggle="popover" data-trigger="hover" data-content="Search Collections currently holding Manuscripts.">Institutions</span>
				{{{ca_collections.preferred_labels%width=220px}}}
				<select name="ca_collections.preferred_labels" value id="ca_collections_preferred_labels_2">
					<option value="">-</option>
<?php
				$o_dm = Datamodel::load();
				$t_instance = $o_dm->getInstanceByTableName('ca_collection_labels', true);
				$o_db = $t_instance->getDb();
				$qr_res = $o_db->query("SELECT DISTINCT name FROM ca_collection_labels INNER JOIN ca_collections ON ca_collections.collection_id = ca_collection_labels.collection_id INNER JOIN ca_objects_x_collections ON ca_collections.collection_id = ca_objects_x_collections.collection_id INNER JOIN ca_objects ON ca_objects_x_collections.object_id = ca_objects.object_id WHERE is_preferred = 1 AND ca_objects.type_id = 23 AND ca_objects.access = 1 ORDER BY name;");
				while($qr_res->nextRow()) {
					$vs_coll_name = $qr_res->get("name");
					print '<option value="'.$vs_coll_name.'">'.$vs_coll_name.'</option>';
				}
?>
				</select>
			</div>
		</div>
		<div class='row'>
			<div class="advancedSearchField col-sm-12 col-md-8">
				<span class='formLabel' data-toggle="popover" data-trigger="hover" data-content="Search on location and period.">Period</span>
				{{{ca_objects.period%width=220px}}}
			</div>
		</div>
		<div class='row'>
			<div class="advancedSearchField col-sm-12 col-md-8">
				<span class='formLabel' data-toggle="popover" data-trigger="hover" data-content="Search across all fields in the database.">Keyword</span>
				{{{_fulltext%width=200px&height=1}}}
			</div>
		</div>
		<div class='row'>
			<div class="advancedSearchField col-sm-12 col-md-8">
				<br style="clear: both;"/>
				<div class='advancedFormSubmit'>
					<span class='btn btn-default'>{{{reset%label=Reset}}}</span>
					<span class='btn btn-default' style="margin-left: 20px;">{{{submit%label=Search}}}</span>
				</div>
			</div>
		</div>
	</div>

{{{/form}}}

		</div>
	</div><!-- end row -->
</div><!-- end container -->

<script>
	jQuery(document).ready(function() {
		$('.advancedSearchField .formLabel').popover();
		$('#ca_collections_preferred_labels').attr('type', 'hidden');
	});

</script>
