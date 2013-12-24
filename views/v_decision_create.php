
<!-- 
	NOTE:
		The tournament bracket used in this page was obtained from the internet. It was a left-to-right bracket. I modified it and
		made it right-to-left.


-->



<p>Instructions: NORTH = YES, SOUTH = NO. Binary numbers symbolize y/n. 1111 = yes yes yes.. 1000 = no no no. In order to link one answer with another, use @ followed by the binary code that corresponds to the answer.. E.g. If at 100 I type @111, that space in the bracket will become 111.. Thus, if the next answer is "yes," the following index will be 1111, and not 1001 (which is what it would have been without the linking). This is a tree, therefore the branching pattern should be intuitive.</p>
<p id="error"></p>

<a href="#" id="create_button">Create Tree</a>

<form>
<div id="form_top">

<label>Name your Decision Making Tree</label><br>
<input type="text" name="tree_name" id="tree_name" size="16" /><br>

<label>Enter tree title: E.g. "Should you get a new iPhone?"</label><br>
<input type="text" name="tree_title" id="tree_title" size="64" /><br>

</div>


<table summary="Tournament Bracket">
 <tr>
  <td rowspan="16"><p><label>1</label><input type="text" name="input-1" id="input-1" size="24"/></p></td>
  <td rowspan="8"><p><label>11</label><input type="text"  name="input-11" id="input-11" size="24"/></p></td>
  <td rowspan="4"><p><label>111</label><input type="text"  name="input-111" id="input-111" size="24"/></p></td>
  <td rowspan="2"><p><label>1111</label><input type="text"  name="input-1111" id="input-1111" size="24"/></p></td>
  <td><p><label>11111</label><input type="text"  name="input-11111" id="input-11111"size="24"/></p></td>
 </tr>
 <tr>
  <td><p><label>11110</label><input type="text" name="input-11110" id="input-11110" size="24"/></p></td>
 </tr>
 <tr>
  <td rowspan="2"><p><label>1110</label><input type="text"  name="input-1110" id="input-1110" size="24"/></p></td>
  <td><p><label>11101</label><input type="text"  name="input-11101" id="input-11101" size="24"/></p></td>
 </tr>
 <tr>
  <td><p><label>11100</label><input type="text"  name="input-11100" id="input-11100" size="24"/></p></td>
 </tr>
 <tr>
  <td rowspan="4"><p><label>110</label><input type="text"  name="input-110" id="input-110" size="24"/></p></td>
  <td rowspan="2"><p><label>1101</label><input type="text"  name="input-1101" id="input-1101" size="24"/></p></td>
  <td><p><label>11011</label><input type="text"  name="input-11011" id="input-11011" size="24"/></p></td>
 </tr>
 <tr>
  <td><p><label>11010</label><input type="text"  name="input-11010" id="input-11010" size="24"/></p></td>
 </tr>
 <tr>
   <td rowspan="2"><p><label>1100</label><input type="text"  name="input-1100" id="input-1100" size="24"/></p></td>
  <td><p><label>11001</label><input type="text"  name="input-11001" id="input-11001" size="24"/></p></td>
 </tr>
 <tr>
  <td><p><label>11000</label><input type="text"  name="input-11000" id="input-11000" size="24"/></p></td>
 </tr>
 <tr>
 <td rowspan="8"><p><label>10</label><input type="text"  name="input-10" id="input-10" size="24"/></p></td>
  <td rowspan="4"><p><label>101</label><input type="text"  name="input-101" id="input-101" size="24"/></p></td>
  <td rowspan="2"><p><label>1011</label><input type="text"  name="input-1011" id="input-1011" size="24"/></p></td>
  <td><p><label>10111</label><input type="text"  name="input-10111" id="input-10111" size="24"/></p></td>
 </tr>
 <tr>
  <td><p><label>10110</label><input type="text"  name="input-10110" id="input-10110" size="24"/></p></td>
 </tr>
 <tr>
 <td rowspan="2"><p><label>1010</label><input type="text"  name="input-1010" id="input-1010" size="24"/></p></td>
  <td><p><label>10101</label><input type="text"  name="input-10101" id="input-10101" size="24"/></p></td>
 </tr>
 <tr>
  <td><p> <label>10100</label><input type="text"  name="input-10100" id="input-10100" size="24"/></p></td>
 </tr>
 <tr>
  <td rowspan="4"><p><label>100</label><input type="text"  name="input-100" id="input-100" size="24"/></p></td>
  <td rowspan="2"><p><label>1001</label><input type="text"  name="input-1001" id="input-1001" size="24"/></p></td>
  <td><p> <label>10011</label><input type="text"  name="input-10011" id="input-10011" size="24"/></p></td>
 </tr>
 <tr>
  <td><p><label>10010</label><input type="text"  name="input-10010" id="input-10010" size="24"/></p></td>
 </tr>
 <tr>
  <td rowspan="2"><p><label>1000</label><input type="text"  name="input-1000" id="input-1000" size="24"/></p></td>
  <td><p><label>10001</label><input type="text"  name="input-10001" id="input-10001" size="24"/></p></td>
 </tr>
 <tr>
  <td><p><label>10000</label><input type="text"  name="input-10000" id="input-10000" size="24"/></p></td>
 </tr>
</table>

</form>