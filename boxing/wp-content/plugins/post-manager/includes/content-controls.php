<?php
echo '<tr>','<th class="seo-label"><label>', $field['name'], '</label></th>','<td>';
switch ($field['type']) {
case 'text':
echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" style="width:100%;" />',$field['desc'];
break;
case 'color':
echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" style="width:100px;float:left;position:relative" class="color_mcp" />',$field['desc'];
break;
case 'file':echo '<input type="file" name="', $field['id'], '" id="', $field['id'], '"  />',$field['desc'];
break;
case 'textarea':
echo '<textarea name="', $field['id'], '" id="', $field['id'], '" class="meta-textarea">', $meta ? $meta : $field['std'], '</textarea>',$field['desc'];
break;
case 'select':
echo '<select name="', $field['id'], '" id="', $field['id'], '">';
foreach ($field['options'] as $option) {echo '<option', $meta == $option ? ' selected="selected"' : '', '>', $option, '</option>';}
echo '</select>';
break;
case 'radio':
foreach ($field['options'] as $option) {
echo '<input type="radio" name="', $field['id'], '" value="', $option['value'], '"', $meta == $option['value'] ? ' checked="checked"' : '', ' />', $option['name'];
}
break;
case 'checkbox':
echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' checked="checked"' : '', ' />';
break;
case 'label':
echo '<label name="', $field['id'], '" id="', $field['id'], '">', $meta ? $meta : $field['std'], '</label>',$field['desc'];
break;
}
echo '</td>','</tr>';
?>