<tr class="form-seo">
<td valign="top" class="seo-label"><div style="margin-top:45px">Title:</div></td>
<td>
<input type="text" name="term_meta[title_meta]" id="term_meta[title_meta]" value="<?php echo esc_attr( $term_meta['title_meta'] ) ? esc_attr( $term_meta['title_meta'] ) : ''; ?>"  style="margin-top:45px;margin-bottom:5px" />
</td>
</tr>

<tr class="form-seo">
<td valign="top" class="seo-label"><div>Meta keywords:</div></td>
<td>
<textarea type="text" name="term_meta[keyword_meta]" id="term_meta[keyword_meta]" rows="5" cols="50" class="large-text">
<?php echo esc_attr( $term_meta['keyword_meta'] ) ? esc_attr( $term_meta['keyword_meta'] ) : ''; ?>
</textarea>
</td>
</tr>

<tr class="form-seo">
<td valign="top" class="seo-label"><div>Meta description:</div></td>
<td>
<textarea type="text" name="term_meta[description_meta]" id="term_meta[description_meta]" rows="5" cols="50" class="large-text">
<?php echo esc_attr( $term_meta['description_meta'] ) ? esc_attr( $term_meta['description_meta'] ) : ''; ?>
</textarea>
</td>
</tr>