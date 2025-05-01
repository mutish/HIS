document.addEventListener("DOMContentLoaded", async function(){
    try {
      const data = await fetch("../assets/counties.json");
  
      const counties = await data.json();
  
      let selectTag = document.getElementById("countyInput");
  
      counties.forEach(county => {
          let option = document.createElement("option");
          option.value = county.county_code;
          option.text = county.county;
          selectTag.appendChild(option);
      });
  
    } catch (error) {
     console.log(error)
    }
 });
 
 
 /*
 <option value="1">Mombasa</option>
             <option value="2">Kwale</option>
             <option value="3">Kilifi</option>
             <option value="4">Tana - River</option>
             <option value="5">Lamu</option>
             <option value="6">Taita_Taveta</option>
             <option value="7">Garissa</option>
             <option value="8">Wajir</option>
             <option value="9">Mandera</option>
             <option value="10">Marsabit</option>
             <option value="11">Isiolo</option>
             <option value="12">Meru</option>
             <option value="13">Tharaka - Nithi</option>
             <option value="14">Embu</option>
             <option value="15">Kitui</option>
             <option value="16">Machakos</option>
             <option value="17">Makueni</option>
             <option value="18">Nyandarua</option>
             <option value="19">Nyeri</option>
             <option value="20">Kirinyaga</option>
             <option value="21">Murang'a</option>
             <option value="22">Kiambu</option>
             <option value="23">Turkana</option>
             <option value="24">West - Pokot</option>
             <option value="25">Samburu</option>
             <option value="26">Trans - Nzoia</option>
             <option value="27">Uasin - Gishu</option>
             <option value="28">Elgeyo - Marakwet</option>
             <option value="29">Nandi</option>
             <option value="30">Baringo</option>
             <option value="31">Laikipia</option>
             <option value="32">Nakuru</option>
             <option value="33">Narok</option>
             <option value="34">Kajiado</option>
             <option value="35">Kericho</option>
             <option value="36">Bomet</option>
             <option value="37">Kakamega</option>
             <option value="38">Vihiga</option>
             <option value="39">Bungoma</option>
             <option value="40">Busia</option>
             <option value="41">Siaya</option>
             <option value="42">Kisumu</option>
             <option value="43">Homa - Bay</option>
             <option value="44">Migori</option>
             <option value="45">Kisii</option>
             <option value="46">Nyamira</option>
             <option value="47">Nairobi</option>
 */