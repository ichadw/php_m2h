<?php $attributes = array('id' => 'insert');?>
<?php echo form_open('admin/timeline_category/insert', $attributes); ?>
<table>
	<tr valign="top">
		<td width="200">Timeline Category Name</td>
		<td>
			<input type="text" id="timeline_category_name" name="timeline_category_name" placeholder="Name..." class="form-control"/>
			<p id="err_name" style="color:red"></p>
		</td>
	</tr>

	<tr valign="top">
		<td>Timeline Category Icon</td>
		<td>
			<input type="text" id="timeline_category_icon" name="timeline_category_icon" placeholder="Icon..." class="form-control"/>
            icon supported by <a href="http://fontawesome.io/icons/" target="_new">font-awesome</a>
			<p id="err_icon" style="color:red"></p>
		</td>
	</tr>

    <tr valign="top">
		<td>Status</td>
		<td>
            <select name="status" class="form-control">
                <option value="1">Active</option>
                <option value="0">Non Active</option>
            </select>
		</td>
	</tr>
</table>
</form>

<script type="text/javascript">
function validation() {
    var flag = "1";
    var timeline_category_name = document.getElementById('timeline_category_name');
    var timeline_category_icon = document.getElementById('timeline_category_icon');

    if(timeline_category_name.value == "" || timeline_category_name.value == null){
        document.getElementById('err_name').innerHTML = "Name Required";
        flag = "0";
    }else{
        document.getElementById('err_name').innerHTML = "";
    }

    if(timeline_category_icon.value == "" || timeline_category_icon.value == null){
        document.getElementById('err_icon').innerHTML = "Icon Required";
        flag = "0";
    }else{
        document.getElementById('err_icon').innerHTML = "";
    }

    if(flag === "1"){
        document.getElementById('insert').submit();
    }
}
</script>
