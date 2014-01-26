
		<h3>ADD BOOK HERE:</h3><br/>

		<form action="/ICSArman/index.php/portal/callAddMaterial" method="post">
			Material ID: <input type="text" name="id"/><br/>
			Title:<input type="text" name="title"/><br/>
			Author: <input type="text" name="author"/><br/>
			Year: <input type="text" name="year"/><br/>
			Publisher: <input type="text" name="publisher"/><br/>
			Date Added: <input type="date" name="date_added"/><br/>
			Quantity: <input type="number" min="0" name="quantity"/><br/>
			Course Code: <input type="text" name="course_code"/><br/>
			<label for="file">Upload photo:</label>
			<input type="file" name="file" id="file" size="50"><br/><br/>
			<input type="submit" name="add_book" value="Add Book"/>
		</form>

		<h3>ADD MAGAZINE HERE:</h3><br/>

		<form action="/ICSArman/index.php/portal/callAddMaterial" method="post">
			Material ID: <input type="text" name="id"/><br/>
			Title:<input type="text" name="title"/><br/>
			Author: <input type="text" name="author"/><br/>
			Year: <input type="text" name="year"/><br/>
			Month: <select name="month">
				<option value="1">January</option>
				<option value="2">February</option>
				<option value="3">March</option>
				<option value="4">April</option>
				<option value="5">May</option>
				<option value="6">June</option>
				<option value="7">July</option>
				<option value="8">August</option>
				<option value="9">September</option>
				<option value="10">October</option>
				<option value="11">November</option>
				<option value="12">December</option>
			</select><br/>
			Volume Number: <input type="text" name="volume_no"/><br/>
			Date Added: <input type="date" name="date_added"/><br/>
			Quantity: <input type="number" min="0" name="quantity"/><br/>
			<label for="file">Upload photo:</label>
			<input type="file" name="file" id="file" size="50"><br/><br/>
			<input type="submit" name="add_mag" value="Add Magazine"/>
		</form>

		<h3>ADD SP/THESIS HERE:</h3><br/>

		<form action="/ICSArman/index.php/portal/callAddMaterial" method="post">
			Material ID: <input type="text" name="id"/><br/>
			Title:<input type="text" name="title"/><br/>
			Author: <input type="text" name="author"/><br/>
			Year: <input type="text" name="year"/><br/>
			Adviser: <input type="text" name="adviser"/><br/>
			Date Added: <input type="date" name="date_added"/><br/>
			Quantity: <input type="number" min="0" name="quantity"/><br/>
			Type: <input type="number" min="0" max="2" name="type"/><br/>
			<label for="file">Upload photo:</label>
			<input type="file" name="file" id="file" size="50"><br/><br/>
			<input type="submit" name="add_spthesis" value="Add SP/Thesis"/>
		</form>

		<h3>OTHER MATERIAL:</h3><br/>

		<form action="/ICSArman/index.php/portal/callAddMaterial" method="post">
			Material ID: <input type="text" name="id"/><br/>
			Title:<input type="text" name="title"/><br/>
			Author: <input type="text" name="author"/><br/>
			Year: <input type="text" name="year"/><br/>
			Date Added: <input type="date" name="date_added"/><br/>
			Quantity: <input type="number" min="0" name="quantity"/><br/>
			Type: <input type="number" min="0" max="2" name="type"/><br/>
			<label for="file">Upload photo:</label>
			<input type="file" name="file" id="file" size="50"><br/><br/>
			<input type="submit" name="add_other" value="Add"/>
		</form>