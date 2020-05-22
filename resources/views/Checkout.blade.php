@extends('layouts.master')

@section('titulo')
    - Admin Animales
@endsection
@section('contenido')
<input type="hidden" id="hiddenid" value="{{Auth::user()->id}}">
<input type="hidden" id="hiddenemail" value="{{Auth::user()->email}}">

    <div id="diventero" class="container">



      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Tus Donaciones</span>
            
            <span id="cantidadProductos" class="badge badge-secondary badge-pill">0</span>
          </h4>

          <ul  id="productosComprando" class="list-group mb-3">
          </ul>

            <div class="input-group">
              <input type="text" id="promocodeinput" class="form-control" placeholder="Promo code">
              <div class="input-group-append">
                <button id="submitid" class="btn btn-secondary">Redeem</button>
              </div>
            </div>
        </div>
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Detalles De Envio</h4>
          <form class="needs-validation" novalidate>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Calle</label>
                <input type="text" class="form-control" id="street" placeholder="" value="" required>
                <div id="streeterror" class="invalid-feedback">
                  Calle mal introducida.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="streetnumber">Numero De Calle</label>
                <input type="text" class="form-control" id="streetnumber" placeholder="" value="" required>
                <div id="streetnumbererror" class="invalid-feedback">
                Numero De Calle Mal Introducida.
                </div>
              </div>
            </div>
            <div class="mb-3">
              <label for="address">location</label>
              <input type="text" class="form-control" id="location" placeholder="Manises" required>
              <div id="locationerror" class="invalid-feedback">
             Ciudad Mal Introducida.
              </div>
            </div>
            <div class="row">
              <div class="col-md-5 mb-3">
                <label for="country">Pais</label>
                <select class="custom-select d-block w-100" id="country" required>
                  <option value="">Choose...</option>
                  <option value="Afganistan">Afghanistan</option>
   <option value="Albania">Albania</option>
   <option value="Algeria">Algeria</option>
   <option value="American Samoa">American Samoa</option>
   <option value="Andorra">Andorra</option>
   <option value="Angola">Angola</option>
   <option value="Anguilla">Anguilla</option>
   <option value="Antigua & Barbuda">Antigua & Barbuda</option>
   <option value="Argentina">Argentina</option>
   <option value="Armenia">Armenia</option>
   <option value="Aruba">Aruba</option>
   <option value="Australia">Australia</option>
   <option value="Austria">Austria</option>
   <option value="Azerbaijan">Azerbaijan</option>
   <option value="Bahamas">Bahamas</option>
   <option value="Bahrain">Bahrain</option>
   <option value="Bangladesh">Bangladesh</option>
   <option value="Barbados">Barbados</option>
   <option value="Belarus">Belarus</option>
   <option value="Belgium">Belgium</option>
   <option value="Belize">Belize</option>
   <option value="Benin">Benin</option>
   <option value="Bermuda">Bermuda</option>
   <option value="Bhutan">Bhutan</option>
   <option value="Bolivia">Bolivia</option>
   <option value="Bonaire">Bonaire</option>
   <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
   <option value="Botswana">Botswana</option>
   <option value="Brazil">Brazil</option>
   <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
   <option value="Brunei">Brunei</option>
   <option value="Bulgaria">Bulgaria</option>
   <option value="Burkina Faso">Burkina Faso</option>
   <option value="Burundi">Burundi</option>
   <option value="Cambodia">Cambodia</option>
   <option value="Cameroon">Cameroon</option>
   <option value="Canada">Canada</option>
   <option value="Canary Islands">Canary Islands</option>
   <option value="Cape Verde">Cape Verde</option>
   <option value="Cayman Islands">Cayman Islands</option>
   <option value="Central African Republic">Central African Republic</option>
   <option value="Chad">Chad</option>
   <option value="Channel Islands">Channel Islands</option>
   <option value="Chile">Chile</option>
   <option value="China">China</option>
   <option value="Christmas Island">Christmas Island</option>
   <option value="Cocos Island">Cocos Island</option>
   <option value="Colombia">Colombia</option>
   <option value="Comoros">Comoros</option>
   <option value="Congo">Congo</option>
   <option value="Cook Islands">Cook Islands</option>
   <option value="Costa Rica">Costa Rica</option>
   <option value="Cote DIvoire">Cote DIvoire</option>
   <option value="Croatia">Croatia</option>
   <option value="Cuba">Cuba</option>
   <option value="Curaco">Curacao</option>
   <option value="Cyprus">Cyprus</option>
   <option value="Czech Republic">Czech Republic</option>
   <option value="Denmark">Denmark</option>
   <option value="Djibouti">Djibouti</option>
   <option value="Dominica">Dominica</option>
   <option value="Dominican Republic">Dominican Republic</option>
   <option value="East Timor">East Timor</option>
   <option value="Ecuador">Ecuador</option>
   <option value="Egypt">Egypt</option>
   <option value="El Salvador">El Salvador</option>
   <option value="Equatorial Guinea">Equatorial Guinea</option>
   <option value="Eritrea">Eritrea</option>
   <option value="Estonia">Estonia</option>
   <option value="Ethiopia">Ethiopia</option>
   <option value="Falkland Islands">Falkland Islands</option>
   <option value="Faroe Islands">Faroe Islands</option>
   <option value="Fiji">Fiji</option>
   <option value="Finland">Finland</option>
   <option value="France">France</option>
   <option value="French Guiana">French Guiana</option>
   <option value="French Polynesia">French Polynesia</option>
   <option value="French Southern Ter">French Southern Ter</option>
   <option value="Gabon">Gabon</option>
   <option value="Gambia">Gambia</option>
   <option value="Georgia">Georgia</option>
   <option value="Germany">Germany</option>
   <option value="Ghana">Ghana</option>
   <option value="Gibraltar">Gibraltar</option>
   <option value="Great Britain">Great Britain</option>
   <option value="Greece">Greece</option>
   <option value="Greenland">Greenland</option>
   <option value="Grenada">Grenada</option>
   <option value="Guadeloupe">Guadeloupe</option>
   <option value="Guam">Guam</option>
   <option value="Guatemala">Guatemala</option>
   <option value="Guinea">Guinea</option>
   <option value="Guyana">Guyana</option>
   <option value="Haiti">Haiti</option>
   <option value="Hawaii">Hawaii</option>
   <option value="Honduras">Honduras</option>
   <option value="Hong Kong">Hong Kong</option>
   <option value="Hungary">Hungary</option>
   <option value="Iceland">Iceland</option>
   <option value="Indonesia">Indonesia</option>
   <option value="India">India</option>
   <option value="Iran">Iran</option>
   <option value="Iraq">Iraq</option>
   <option value="Ireland">Ireland</option>
   <option value="Isle of Man">Isle of Man</option>
   <option value="Israel">Israel</option>
   <option value="Italy">Italy</option>
   <option value="Jamaica">Jamaica</option>
   <option value="Japan">Japan</option>
   <option value="Jordan">Jordan</option>
   <option value="Kazakhstan">Kazakhstan</option>
   <option value="Kenya">Kenya</option>
   <option value="Kiribati">Kiribati</option>
   <option value="Korea North">Korea North</option>
   <option value="Korea Sout">Korea South</option>
   <option value="Kuwait">Kuwait</option>
   <option value="Kyrgyzstan">Kyrgyzstan</option>
   <option value="Laos">Laos</option>
   <option value="Latvia">Latvia</option>
   <option value="Lebanon">Lebanon</option>
   <option value="Lesotho">Lesotho</option>
   <option value="Liberia">Liberia</option>
   <option value="Libya">Libya</option>
   <option value="Liechtenstein">Liechtenstein</option>
   <option value="Lithuania">Lithuania</option>
   <option value="Luxembourg">Luxembourg</option>
   <option value="Macau">Macau</option>
   <option value="Macedonia">Macedonia</option>
   <option value="Madagascar">Madagascar</option>
   <option value="Malaysia">Malaysia</option>
   <option value="Malawi">Malawi</option>
   <option value="Maldives">Maldives</option>
   <option value="Mali">Mali</option>
   <option value="Malta">Malta</option>
   <option value="Marshall Islands">Marshall Islands</option>
   <option value="Martinique">Martinique</option>
   <option value="Mauritania">Mauritania</option>
   <option value="Mauritius">Mauritius</option>
   <option value="Mayotte">Mayotte</option>
   <option value="Mexico">Mexico</option>
   <option value="Midway Islands">Midway Islands</option>
   <option value="Moldova">Moldova</option>
   <option value="Monaco">Monaco</option>
   <option value="Mongolia">Mongolia</option>
   <option value="Montserrat">Montserrat</option>
   <option value="Morocco">Morocco</option>
   <option value="Mozambique">Mozambique</option>
   <option value="Myanmar">Myanmar</option>
   <option value="Nambia">Nambia</option>
   <option value="Nauru">Nauru</option>
   <option value="Nepal">Nepal</option>
   <option value="Netherland Antilles">Netherland Antilles</option>
   <option value="Netherlands">Netherlands (Holland, Europe)</option>
   <option value="Nevis">Nevis</option>
   <option value="New Caledonia">New Caledonia</option>
   <option value="New Zealand">New Zealand</option>
   <option value="Nicaragua">Nicaragua</option>
   <option value="Niger">Niger</option>
   <option value="Nigeria">Nigeria</option>
   <option value="Niue">Niue</option>
   <option value="Norfolk Island">Norfolk Island</option>
   <option value="Norway">Norway</option>
   <option value="Oman">Oman</option>
   <option value="Pakistan">Pakistan</option>
   <option value="Palau Island">Palau Island</option>
   <option value="Palestine">Palestine</option>
   <option value="Panama">Panama</option>
   <option value="Papua New Guinea">Papua New Guinea</option>
   <option value="Paraguay">Paraguay</option>
   <option value="Peru">Peru</option>
   <option value="Phillipines">Philippines</option>
   <option value="Pitcairn Island">Pitcairn Island</option>
   <option value="Poland">Poland</option>
   <option value="Portugal">Portugal</option>
   <option value="Puerto Rico">Puerto Rico</option>
   <option value="Qatar">Qatar</option>
   <option value="Republic of Montenegro">Republic of Montenegro</option>
   <option value="Republic of Serbia">Republic of Serbia</option>
   <option value="Reunion">Reunion</option>
   <option value="Romania">Romania</option>
   <option value="Russia">Russia</option>
   <option value="Rwanda">Rwanda</option>
   <option value="St Barthelemy">St Barthelemy</option>
   <option value="St Eustatius">St Eustatius</option>
   <option value="St Helena">St Helena</option>
   <option value="St Kitts-Nevis">St Kitts-Nevis</option>
   <option value="St Lucia">St Lucia</option>
   <option value="St Maarten">St Maarten</option>
   <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
   <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
   <option value="Saipan">Saipan</option>
   <option value="Samoa">Samoa</option>
   <option value="Samoa American">Samoa American</option>
   <option value="San Marino">San Marino</option>
   <option value="Sao Tome & Principe">Sao Tome & Principe</option>
   <option value="Saudi Arabia">Saudi Arabia</option>
   <option value="Senegal">Senegal</option>
   <option value="Seychelles">Seychelles</option>
   <option value="Sierra Leone">Sierra Leone</option>
   <option value="Singapore">Singapore</option>
   <option value="Slovakia">Slovakia</option>
   <option value="Slovenia">Slovenia</option>
   <option value="Solomon Islands">Solomon Islands</option>
   <option value="Somalia">Somalia</option>
   <option value="South Africa">South Africa</option>
   <option value="Spain">Spain</option>
   <option value="Sri Lanka">Sri Lanka</option>
   <option value="Sudan">Sudan</option>
   <option value="Suriname">Suriname</option>
   <option value="Swaziland">Swaziland</option>
   <option value="Sweden">Sweden</option>
   <option value="Switzerland">Switzerland</option>
   <option value="Syria">Syria</option>
   <option value="Tahiti">Tahiti</option>
   <option value="Taiwan">Taiwan</option>
   <option value="Tajikistan">Tajikistan</option>
   <option value="Tanzania">Tanzania</option>
   <option value="Thailand">Thailand</option>
   <option value="Togo">Togo</option>
   <option value="Tokelau">Tokelau</option>
   <option value="Tonga">Tonga</option>
   <option value="Trinidad & Tobago">Trinidad & Tobago</option>
   <option value="Tunisia">Tunisia</option>
   <option value="Turkey">Turkey</option>
   <option value="Turkmenistan">Turkmenistan</option>
   <option value="Turks & Caicos Is">Turks & Caicos Is</option>
   <option value="Tuvalu">Tuvalu</option>
   <option value="Uganda">Uganda</option>
   <option value="United Kingdom">United Kingdom</option>
   <option value="Ukraine">Ukraine</option>
   <option value="United Arab Erimates">United Arab Emirates</option>
   <option value="United States of America">United States of America</option>
   <option value="Uraguay">Uruguay</option>
   <option value="Uzbekistan">Uzbekistan</option>
   <option value="Vanuatu">Vanuatu</option>
   <option value="Vatican City State">Vatican City State</option>
   <option value="Venezuela">Venezuela</option>
   <option value="Vietnam">Vietnam</option>
   <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
   <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
   <option value="Wake Island">Wake Island</option>
   <option value="Wallis & Futana Is">Wallis & Futana Is</option>
   <option value="Yemen">Yemen</option>
   <option value="Zaire">Zaire</option>
   <option value="Zambia">Zambia</option>
   <option value="Zimbabwe">Zimbabwe</option>
                </select>
                <div id="countryerror" class="invalid-feedback">
                  Selecciona un pais valido.
                </div>
              </div>

              <div class="col-md-4 mb-3">
                <label for="province">Provincia</label>
                <select  id="province" class="custom-select d-block w-100" name="prueba" required>
                  <option value="choose">Choose...</option>               
 <option value='alava'>Álava</option>
    <option value='albacete'>Albacete</option>
    <option value='alicante'>Alicante/Alacant</option>
    <option value='almeria'>Almería</option>
    <option value='asturias'>Asturias</option>
    <option value='avila'>Ávila</option>
    <option value='badajoz'>Badajoz</option>
    <option value='barcelona'>Barcelona</option>
    <option value='burgos'>Burgos</option>
    <option value='caceres'>Cáceres</option>
    <option value='cadiz'>Cádiz</option>
    <option value='cantabria'>Cantabria</option>
    <option value='castellon'>Castellón/Castelló</option>
    <option value='ceuta'>Ceuta</option>
    <option value='ciudadreal'>Ciudad Real</option>
    <option value='cordoba'>Córdoba</option>
    <option value='cuenca'>Cuenca</option>
    <option value='girona'>Girona</option>
    <option value='laspalmas'>Las Palmas</option>
    <option value='granada'>Granada</option>
    <option value='guadalajara'>Guadalajara</option>
    <option value='guipuzcoa'>Guipúzcoa</option>
    <option value='huelva'>Huelva</option>
    <option value='huesca'>Huesca</option>
    <option value='illesbalears'>Illes Balears</option>
    <option value='jaen'>Jaén</option>
    <option value='acoruña'>A Coruña</option>
    <option value='larioja'>La Rioja</option>
    <option value='leon'>León</option>
    <option value='lleida'>Lleida</option>
    <option value='lugo'>Lugo</option>
    <option value='madrid'>Madrid</option>
    <option value='malaga'>Málaga</option>
    <option value='melilla'>Melilla</option>
    <option value='murcia'>Murcia</option>
    <option value='navarra'>Navarra</option>
    <option value='ourense'>Ourense</option>
    <option value='palencia'>Palencia</option>
    <option value='pontevedra'>Pontevedra</option>
    <option value='salamanca'>Salamanca</option>
    <option value='segovia'>Segovia</option>
    <option value='sevilla'>Sevilla</option>
    <option value='soria'>Soria</option>
    <option value='tarragona'>Tarragona</option>
    <option value='santacruztenerife'>Santa Cruz de Tenerife</option>
    <option value='teruel'>Teruel</option>
    <option value='toledo'>Toledo</option>
    <option value='valencia'>Valencia/Valéncia</option>
    <option value='valladolid'>Valladolid</option>
    <option value='vizcaya'>Vizcaya</option>
    <option value='zamora'>Zamora</option>
    <option value='zaragoza'>Zaragoza</option>
                </select>
                <div id="provinceerror" class="invalid-feedback">
                  Introduzca una provincia valida.
                </div>
              </div>








              <div class="col-md-4 mb-3">
                <label for="way">Tipo De Via</label>
                <select class="custom-select d-block w-100" id="way" required>
                  <option value="">Elegir...</option>               
                                <option value='plaza'>Plaza</option>
    <option value='avenida'>Avenida</option>
    <option value='bulevar'>Bulevar</option>
    <option value='calle'>calle</option>
                </select>
                <div id="wayerror" class="invalid-feedback">
                  Introduze una via valida.
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="zip">Zip</label>
                <input type="number" class="form-control" id="postal_code" placeholder="46940" required>
                <div id="postal_codeerror" class="invalid-feedback">
                  Postal code required.
                </div>
              </div>
            </div>
            <hr class="mb-4">

            <div id="checkboxsave" class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="save-info">
              <label class="custom-control-label" for="save-info">Save this information for next time</label>


<ul>
@foreach($direcciones as $direccion)

<li> <b>Calle: </b> {{$direccion->street}} <br><b>Numero: </b> {{$direccion->number}} <br><b>Código Postal: </b> {{$direccion->postal_code}} <br> <b>Localización </b>   {{$direccion->location}} <br> 
<b>Provincia: </b> {{$direccion->province}}<br> <b>Pais: </b> {{$direccion->country}}<br>  <b>Tipo: </b> {{$direccion->way}}
<input type="radio" id="{{$direccion->id}}" name="direccion" value="{{$direccion->id}}"> </li>


@endforeach
</ul>
            </div>

            <hr class="mb-4">

            <h4 class="mb-3">Payment</h4>

            <div class="d-block my-3">
              <div id="paymentmethodradio" class="custom-control custom-radio">
                <input id="credit" name="paymentMethod"   value="Credit card"  type="radio" class="custom-control-input" checked required>
                <label class="custom-control-label" value="Credit card" for="credit">Credit card</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="debit" name="paymentMethod"  value="Debit card"   type="radio" class="custom-control-input" required>
                <label class="custom-control-label" value="Debit card" for="debit">Debit card</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="paypal" name="paymentMethod"    value="Paypal" type="radio" class="custom-control-input" required>
                <label class="custom-control-label" value="Paypal" for="paypal">Paypal</label>
              </div>

            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="cc-name">Nombre En La Tarjeta</label>
                <input type="text" class="form-control" id="cc-name" placeholder="" required>
                <small class="text-muted">Nombre Completo De La Tarjeta</small>
                <div class="invalid-feedback">
                  El Nombre En La Tarjeta Es Requerido
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="cc-number">Numero Tarjeta </label>
                <input type="text" class="form-control" id="cc-number" placeholder="" required>
                <div class="invalid-feedback">
               El Numero De La Tarjeta Es Requerido
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 mb-3">
                <label for="cc-expiration">Fecha Expiración</label>
                <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                <div class="invalid-feedback">
               La Fecha De Expiración Es Necesaria
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="cc-expiration">CVV</label>
                <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                <div class="invalid-feedback">
                  Codigo De Seguridad Es Necesario 
                </div>
              </div>
            </div>
            <hr class="mb-4">
            <button  id="submitbutton" class="button" type="submit" value="Submit" data-hover="Haz Click Aqui!"><span>Pagar</span></button>
          </form>
        </div>
      </div>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    </div>
    <script src="/js/checkout.js"></script>
 
    @endsection