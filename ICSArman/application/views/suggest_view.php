		<h3>ADD SUGGESTION HERE:</h3><br/>


		<form enctype="multipart/form-data" action="/ICSArman/index.php/suggestions/callAddSuggestion" method="post">
			User ID:<input type="text" name="user_id"/><br/>
			Title:<input type="text" name="title"/><br/>
			Author: <input type="text" name="author"/><br/>
			Publisher: <input type="text" name="publisher"/><br/>
			Year of Publication: <input type="number" min='1500' max='2014' name="year"/><br/>
			Type: <select name="type">
				<option value="book">Book</option>
				<option value="magazine">Magazine</option>
				<option value="others">Others</option>
			</select><br/>
			<input type="submit" name="suggest" value="Send Suggestion"/>
		</form>