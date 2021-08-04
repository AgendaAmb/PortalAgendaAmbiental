@extends('Plantillas.principal')
@push('st')
<link rel="stylesheet" href="{{ asset('css/Institucional.css') }}">
@endpush
@section('title', 'Acceso')


@section('FormularioInicioSesion')

<div class="row justify-content-center mt-1">
    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
        <div class="sticky-top "> <img
                src="{{asset('storage/imagenes/ods/circulo-UASLP-SOCIEDAD-e1587668903442.webp')}}" class="img-fluid"
                id="imglogo" alt=""></div>
        <div class="card" id="loginCard">
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input id="email" placeholder="EMAIL" type="email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <!--
                        <label for="password" class="col-md-4 col-form-label ">{{ __('Contraseña') }}</label>
                        -->
                        <div class="col-md-12">
                            <input id="password" placeholder="CONTRASEÑA" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row m-0">
                        <div class="col-md-12 col-sm-12 col-lg-12 pt-4 ">

                            <button type="submit" class="btn btn-light btn-lg btn-block font-weight-bold">
                                {{ __('Entrar') }}
                            </button>
                        </div>
                        <div class="col-lg-12 pt-5">
                            <p class="text-white  h6 mt-4">¿No tienes cuenta?<a class="font-weight-bold"
                                    data-toggle="modal" data-target="#Registro">
                                    {{ __('Registrate aquí ') }}
                                </a>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
        <div class="card-footer" id="loginCardFooter">
            <div class="container mb-5 p-0">
                <p class="text-center h4 font-weight-bold">DOCENTES</p>
                <div class="col-lg-12  col-xl-12 text-justify  p-0 mb-4">
                    <p class=" text-muted h6"> Pueden ingresar con su cuenta de correo institucional ya que el usuario y
                        contraseña son los mismos. Si no cuenta con su cuenta de correo, lo puede habilitar en el
                        siguiente vínculo: <a href=" https://tic.uaslp.mx/habilitacorreo">
                            https://tic.uaslp.mx/habilitacorreo</a>
                        <br>
                        Si no recuerda su contraseña, la puede cambiar en el siguiente vínculo: <a
                            href="https://tic.uaslp.mx/CambiaPassword">https://tic.uaslp.mx/CambiaPassword</a>
                    </P>
                </div>
                <p class="text-center h4 font-weight-bold">CONTACTO</p>
                <div class="col-lg-12 text-justify p-0 mb-4">
                    <p class=" text-muted h6"> Comentarios, sugerencia o soporte, podrá realizarlos por nuestros
                        mecanismos formales:
                        <br>
                        Correo electrónico: <a href="mailto:rtic.ambiental@uaslp.mx ">rtic.ambiental@uaslp.mx </a>
                        <br>
                        Voz: +52 444 8262300 extensión 7203

                        <br>
                        Buzón de sugerencias : <a href="http://a.uaslp.mx/ContactaCAA ">http://a.uaslp.mx/ContactaCAA
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade " id="Registro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class=" modal-dialog modal-xl">
        <div class="modal-content px-xl-5 px-lg-5 px-md-4 px-sm-3 px-2" style="background-color: #8b96a8">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel">Registro</h2>
                <button type="button" class="close d-xl-none d-lg-none" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">X</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="form-group ">
                            <label for="inputPertenecesUASLP ">¿Perteneces a la comunidad de la UASLP?</label>
                        </div>
                        <div class="form-group ">
                            <select id="inputPertenecesUASLP" class="form-control" v-model="PerteneceUaslp" required
                                v-on:change="RestableceValores()">
                                <option disabled value="">Opción</option>
                                <option>Si</option>
                                <option>No</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row" v-if="PerteneceUaslp === 'Si'">
                        <div class="form-group col-md-10 col-sm-10 col-10  was-validated">
                            <label for="email">Ingresa tu RPE/Clave única de alumno ó correo Institucional</label>
                            <input type="text" class="form-control" id="emailR" v-model="emailR" name="email" required>
                            <span class="text-danger" role="alert" v-if="Errores[0].Visible">
                                @{{Errores[0].Mensaje}}
                            </span>
                        </div>
                        <input type="hidden" name="Dependencia" v-model="Facultad">
                        <div class="form-group col-md-2 col-sm-2 col-2">

                            <a class="btn btn btn-outline-light mt-md-2 mt-md-4" v-on:click="uaslpUser" v-if="!spinnerVisible"><i
                                    class="fas fa-search"></i></a>
                            <button class="btn btn-light mt-md-2 mt-md-4" type="button" disabled v-if="spinnerVisible">
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                <span class="sr-only">Cargando...</span>
                            </button>
                        </div>


                    </div>
                    <div class="form-row" v-if="PerteneceUaslp === 'No'">
                        <div class="form-group col-md-12 was-validated">
                            <label for="email">Ingresa un correo electrónico</label>
                            <input type="email" class="form-control" id="emailR" name="email" required>
                        </div>
                        <div class="form-group col-md-6 was-validated">
                            <label for="password">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" required
                                v-model="password" v-on:change="VerificarContraseña()" minlength="8">
                        </div>
                        <div class="form-group col-md-6 was-validated">
                            <label for="passwordR">Repite tu Contraseña</label>
                            <input type="password" class="form-control" id="passwordR" name="passwordR" required
                                v-model="passwordR" v-on:change="VerificarContraseña()" minlength="8">
                        </div>

                        <span class="text-danger" role="alert" v-if="Errores[1].Visible">
                            @{{Errores[1].Mensaje}}
                        </span>
                    </div>
                    <h5 class="modal-title" id="exampleModalLabel">Datos Personales</h5>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="inputPertenecesUASLP ">País de origen</label>
                        </div>
                        <div class="form-group col-md-2 ">
                            <select id="Pais" class="form-control" v-model="Pais" required name="Pais">
                                <option disabled value="">País</option>
                                <option value="Elegir" id="AF">Elegir opción</option>
                                <option value="Afganistán" id="AF">Afganistán</option>
                                <option value="Albania" id="AL">Albania</option>
                                <option value="Alemania" id="DE">Alemania</option>
                                <option value="Andorra" id="AD">Andorra</option>
                                <option value="Angola" id="AO">Angola</option>
                                <option value="Anguila" id="AI">Anguila</option>
                                <option value="Antártida" id="AQ">Antártida</option>
                                <option value="Antigua y Barbuda" id="AG">Antigua y Barbuda</option>
                                <option value="Antillas holandesas" id="AN">Antillas holandesas</option>
                                <option value="Arabia Saudí" id="SA">Arabia Saudí</option>
                                <option value="Argelia" id="DZ">Argelia</option>
                                <option value="Argentina" id="AR">Argentina</option>
                                <option value="Armenia" id="AM">Armenia</option>
                                <option value="Aruba" id="AW">Aruba</option>
                                <option value="Australia" id="AU">Australia</option>
                                <option value="Austria" id="AT">Austria</option>
                                <option value="Azerbaiyán" id="AZ">Azerbaiyán</option>
                                <option value="Bahamas" id="BS">Bahamas</option>
                                <option value="Bahrein" id="BH">Bahrein</option>
                                <option value="Bangladesh" id="BD">Bangladesh</option>
                                <option value="Barbados" id="BB">Barbados</option>
                                <option value="Bélgica" id="BE">Bélgica</option>
                                <option value="Belice" id="BZ">Belice</option>
                                <option value="Benín" id="BJ">Benín</option>
                                <option value="Bermudas" id="BM">Bermudas</option>
                                <option value="Bhután" id="BT">Bhután</option>
                                <option value="Bielorrusia" id="BY">Bielorrusia</option>
                                <option value="Birmania" id="MM">Birmania</option>
                                <option value="Bolivia" id="BO">Bolivia</option>
                                <option value="Bosnia y Herzegovina" id="BA">Bosnia y Herzegovina</option>
                                <option value="Botsuana" id="BW">Botsuana</option>
                                <option value="Brasil" id="BR">Brasil</option>
                                <option value="Brunei" id="BN">Brunei</option>
                                <option value="Bulgaria" id="BG">Bulgaria</option>
                                <option value="Burkina Faso" id="BF">Burkina Faso</option>
                                <option value="Burundi" id="BI">Burundi</option>
                                <option value="Cabo Verde" id="CV">Cabo Verde</option>
                                <option value="Camboya" id="KH">Camboya</option>
                                <option value="Camerún" id="CM">Camerún</option>
                                <option value="Canadá" id="CA">Canadá</option>
                                <option value="Chad" id="TD">Chad</option>
                                <option value="Chile" id="CL">Chile</option>
                                <option value="China" id="CN">China</option>
                                <option value="Chipre" id="CY">Chipre</option>
                                <option value="Ciudad estado del Vaticano" id="VA">Ciudad estado del Vaticano</option>
                                <option value="Colombia" id="CO">Colombia</option>
                                <option value="Comores" id="KM">Comores</option>
                                <option value="Congo" id="CG">Congo</option>
                                <option value="Corea" id="KR">Corea</option>
                                <option value="Corea del Norte" id="KP">Corea del Norte</option>
                                <option value="Costa del Marfíl" id="CI">Costa del Marfíl</option>
                                <option value="Costa Rica" id="CR">Costa Rica</option>
                                <option value="Croacia" id="HR">Croacia</option>
                                <option value="Cuba" id="CU">Cuba</option>
                                <option value="Dinamarca" id="DK">Dinamarca</option>
                                <option value="Djibouri" id="DJ">Djibouri</option>
                                <option value="Dominica" id="DM">Dominica</option>
                                <option value="Ecuador" id="EC">Ecuador</option>
                                <option value="Egipto" id="EG">Egipto</option>
                                <option value="El Salvador" id="SV">El Salvador</option>
                                <option value="Emiratos Arabes Unidos" id="AE">Emiratos Arabes Unidos</option>
                                <option value="Eritrea" id="ER">Eritrea</option>
                                <option value="Eslovaquia" id="SK">Eslovaquia</option>
                                <option value="Eslovenia" id="SI">Eslovenia</option>
                                <option value="España" id="ES">España</option>
                                <option value="Estados Unidos" id="US">Estados Unidos</option>
                                <option value="Estonia" id="EE">Estonia</option>
                                <option value="c" id="ET">Etiopía</option>
                                <option value="Ex-República Yugoslava de Macedonia" id="MK">Ex-República Yugoslava de
                                    Macedonia</option>
                                <option value="Filipinas" id="PH">Filipinas</option>
                                <option value="Finlandia" id="FI">Finlandia</option>
                                <option value="Francia" id="FR">Francia</option>
                                <option value="Gabón" id="GA">Gabón</option>
                                <option value="Gambia" id="GM">Gambia</option>
                                <option value="Georgia" id="GE">Georgia</option>
                                <option value="Georgia del Sur y las islas Sandwich del Sur" id="GS">Georgia del Sur y
                                    las islas Sandwich del Sur</option>
                                <option value="Ghana" id="GH">Ghana</option>
                                <option value="Gibraltar" id="GI">Gibraltar</option>
                                <option value="Granada" id="GD">Granada</option>
                                <option value="Grecia" id="GR">Grecia</option>
                                <option value="Groenlandia" id="GL">Groenlandia</option>
                                <option value="Guadalupe" id="GP">Guadalupe</option>
                                <option value="Guam" id="GU">Guam</option>
                                <option value="Guatemala" id="GT">Guatemala</option>
                                <option value="Guayana" id="GY">Guayana</option>
                                <option value="Guayana francesa" id="GF">Guayana francesa</option>
                                <option value="Guinea" id="GN">Guinea</option>
                                <option value="Guinea Ecuatorial" id="GQ">Guinea Ecuatorial</option>
                                <option value="Guinea-Bissau" id="GW">Guinea-Bissau</option>
                                <option value="Haití" id="HT">Haití</option>
                                <option value="Holanda" id="NL">Holanda</option>
                                <option value="Honduras" id="HN">Honduras</option>
                                <option value="Hong Kong R. A. E" id="HK">Hong Kong R. A. E</option>
                                <option value="Hungría" id="HU">Hungría</option>
                                <option value="India" id="IN">India</option>
                                <option value="Indonesia" id="ID">Indonesia</option>
                                <option value="Irak" id="IQ">Irak</option>
                                <option value="Irán" id="IR">Irán</option>
                                <option value="Irlanda" id="IE">Irlanda</option>
                                <option value="Isla Bouvet" id="BV">Isla Bouvet</option>
                                <option value="Isla Christmas" id="CX">Isla Christmas</option>
                                <option value="Isla Heard e Islas McDonald" id="HM">Isla Heard e Islas McDonald</option>
                                <option value="Islandia" id="IS">Islandia</option>
                                <option value="Islas Caimán" id="KY">Islas Caimán</option>
                                <option value="Islas Cook" id="CK">Islas Cook</option>
                                <option value="Islas de Cocos o Keeling" id="CC">Islas de Cocos o Keeling</option>
                                <option value="Islas Faroe" id="FO">Islas Faroe</option>
                                <option value="Islas Fiyi" id="FJ">Islas Fiyi</option>
                                <option value="Islas Malvinas Islas Falkland" id="FK">Islas Malvinas Islas Falkland
                                </option>
                                <option value="Islas Marianas del norte" id="MP">Islas Marianas del norte</option>
                                <option value="Islas Marshall" id="MH">Islas Marshall</option>
                                <option value="Islas menores de Estados Unidos" id="UM">Islas menores de Estados Unidos
                                </option>
                                <option value="Islas Palau" id="PW">Islas Palau</option>
                                <option value="Islas Salomón" d="SB">Islas Salomón</option>
                                <option value="Islas Tokelau" id="TK">Islas Tokelau</option>
                                <option value="Islas Turks y Caicos" id="TC">Islas Turks y Caicos</option>
                                <option value="Islas Vírgenes EE.UU." id="VI">Islas Vírgenes EE.UU.</option>
                                <option value="Islas Vírgenes Reino Unido" id="VG">Islas Vírgenes Reino Unido</option>
                                <option value="Israel" id="IL">Israel</option>
                                <option value="Italia" id="IT">Italia</option>
                                <option value="Jamaica" id="JM">Jamaica</option>
                                <option value="Japón" id="JP">Japón</option>
                                <option value="Jordania" id="JO">Jordania</option>
                                <option value="Kazajistán" id="KZ">Kazajistán</option>
                                <option value="Kenia" id="KE">Kenia</option>
                                <option value="Kirguizistán" id="KG">Kirguizistán</option>
                                <option value="Kiribati" id="KI">Kiribati</option>
                                <option value="Kuwait" id="KW">Kuwait</option>
                                <option value="Laos" id="LA">Laos</option>
                                <option value="Lesoto" id="LS">Lesoto</option>
                                <option value="Letonia" id="LV">Letonia</option>
                                <option value="Líbano" id="LB">Líbano</option>
                                <option value="Liberia" id="LR">Liberia</option>
                                <option value="Libia" id="LY">Libia</option>
                                <option value="Liechtenstein" id="LI">Liechtenstein</option>
                                <option value="Lituania" id="LT">Lituania</option>
                                <option value="Luxemburgo" id="LU">Luxemburgo</option>
                                <option value="Macao R. A. E" id="MO">Macao R. A. E</option>
                                <option value="Madagascar" id="MG">Madagascar</option>
                                <option value="Malasia" id="MY">Malasia</option>
                                <option value="Malawi" id="MW">Malawi</option>
                                <option value="Maldivas" id="MV">Maldivas</option>
                                <option value="Malí" id="ML">Malí</option>
                                <option value="Malta" id="MT">Malta</option>
                                <option value="Marruecos" id="MA">Marruecos</option>
                                <option value="Martinica" id="MQ">Martinica</option>
                                <option value="Mauricio" id="MU">Mauricio</option>
                                <option value="Mauritania" id="MR">Mauritania</option>
                                <option value="Mayotte" id="YT">Mayotte</option>
                                <option value="México" id="MX">México</option>
                                <option value="Micronesia" id="FM">Micronesia</option>
                                <option value="Moldavia" id="MD">Moldavia</option>
                                <option value="Mónaco" id="MC">Mónaco</option>
                                <option value="Mongolia" id="MN">Mongolia</option>
                                <option value="Montserrat" id="MS">Montserrat</option>
                                <option value="Mozambique" id="MZ">Mozambique</option>
                                <option value="Namibia" id="NA">Namibia</option>
                                <option value="Nauru" id="NR">Nauru</option>
                                <option value="Nepal" id="NP">Nepal</option>
                                <option value="Nicaragua" id="NI">Nicaragua</option>
                                <option value="Níger" id="NE">Níger</option>
                                <option value="Nigeria" id="NG">Nigeria</option>
                                <option value="Niue" id="NU">Niue</option>
                                <option value="Norfolk" id="NF">Norfolk</option>
                                <option value="Noruega" id="NO">Noruega</option>
                                <option value="Nueva Caledonia" id="NC">Nueva Caledonia</option>
                                <option value="Nueva Zelanda" id="NZ">Nueva Zelanda</option>
                                <option value="Omán" id="OM">Omán</option>
                                <option value="Panamá" id="PA">Panamá</option>
                                <option value="Papua Nueva Guinea" id="PG">Papua Nueva Guinea</option>
                                <option value="Paquistán" id="PK">Paquistán</option>
                                <option value="Paraguay" id="PY">Paraguay</option>
                                <option value="Perú" id="PE">Perú</option>
                                <option value="Pitcairn" id="PN">Pitcairn</option>
                                <option value="Polinesia francesa" id="PF">Polinesia francesa</option>
                                <option value="Polonia" id="PL">Polonia</option>
                                <option value="Portugal" id="PT">Portugal</option>
                                <option value="Puerto Rico" id="PR">Puerto Rico</option>
                                <option value="Qatar" id="QA">Qatar</option>
                                <option value="Reino Unido" id="UK">Reino Unido</option>
                                <option value="República Centroafricana" id="CF">República Centroafricana</option>
                                <option value="República Checa" id="CZ">República Checa</option>
                                <option value="República de Sudáfrica" id="ZA">República de Sudáfrica</option>
                                <option value="República Democrática del Congo Zaire" id="CD">República Democrática del
                                    Congo Zaire</option>
                                <option value="República Dominicana" id="DO">República Dominicana</option>
                                <option value="Reunión" id="RE">Reunión</option>
                                <option value="Ruanda" id="RW">Ruanda</option>
                                <option value="Rumania" id="RO">Rumania</option>
                                <option value="Rusia" id="RU">Rusia</option>
                                <option value="Samoa" id="WS">Samoa</option>
                                <option value="Samoa occidental" id="AS">Samoa occidental</option>
                                <option value="San Kitts y Nevis" id="KN">San Kitts y Nevis</option>
                                <option value="San Marino" id="SM">San Marino</option>
                                <option value="San Pierre y Miquelon" id="PM">San Pierre y Miquelon</option>
                                <option value="San Vicente e Islas Granadinas" id="VC">San Vicente e Islas Granadinas
                                </option>
                                <option value="Santa Helena" id="SH">Santa Helena</option>
                                <option value="Santa Lucía" id="LC">Santa Lucía</option>
                                <option value="Santo Tomé y Príncipe" id="ST">Santo Tomé y Príncipe</option>
                                <option value="Senegal" id="SN">Senegal</option>
                                <option value="Serbia y Montenegro" id="YU">Serbia y Montenegro</option>
                                <option value="Sychelles" id="SC">Seychelles</option>
                                <option value="Sierra Leona" id="SL">Sierra Leona</option>
                                <option value="Singapur" id="SG">Singapur</option>
                                <option value="Siria" id="SY">Siria</option>
                                <option value="Somalia" id="SO">Somalia</option>
                                <option value="Sri Lanka" id="LK">Sri Lanka</option>
                                <option value="Suazilandia" id="SZ">Suazilandia</option>
                                <option value="Sudán" id="SD">Sudán</option>
                                <option value="Suecia" id="SE">Suecia</option>
                                <option value="Suiza" id="CH">Suiza</option>
                                <option value="Surinam" id="SR">Surinam</option>
                                <option value="Svalbard" id="SJ">Svalbard</option>
                                <option value="Tailandia" id="TH">Tailandia</option>
                                <option value="Taiwán" id="TW">Taiwán</option>
                                <option value="Tanzania" id="TZ">Tanzania</option>
                                <option value="Tayikistán" id="TJ">Tayikistán</option>
                                <option value="Territorios británicos del océano Indico" id="IO">Territorios británicos
                                    del océano Indico</option>
                                <option value="Territorios franceses del sur" id="TF">Territorios franceses del sur
                                </option>
                                <option value="Timor Oriental" id="TP">Timor Oriental</option>
                                <option value="Togo" id="TG">Togo</option>
                                <option value="Tonga" id="TO">Tonga</option>
                                <option value="Trinidad y Tobago" id="TT">Trinidad y Tobago</option>
                                <option value="Túnez" id="TN">Túnez</option>
                                <option value="Turkmenistán" id="TM">Turkmenistán</option>
                                <option value="Turquía" id="TR">Turquía</option>
                                <option value="Tuvalu" id="TV">Tuvalu</option>
                                <option value="Ucrania" id="UA">Ucrania</option>
                                <option value="Uganda" id="UG">Uganda</option>
                                <option value="Uruguay" id="UY">Uruguay</option>
                                <option value="Uzbekistán" id="UZ">Uzbekistán</option>
                                <option value="Vanuatu" id="VU">Vanuatu</option>
                                <option value="Venezuela" id="VE">Venezuela</option>
                                <option value="Vietnam" id="VN">Vietnam</option>
                                <option value="Wallis y Futuna" id="WF">Wallis y Futuna</option>
                                <option value="Yemen" id="YE">Yemen</option>
                                <option value="Zambia" id="ZM">Zambia</option>
                                <option value="Zimbabue" id="ZW">Zimbabue</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row" v-if="Pais === 'México'">
                        <div class="form-group col-md-1">
                            <label for="CURP ">CURP</label>
                        </div>
                        <div class="form-group col-md-11  was-validated">
                            <input type="text" class="form-control" id="CURP" required
                                style="text-transform: uppercase;" maxlength="18" name="CURP">
                        </div>
                    </div>
                    <div class="form-group  was-validated">
                        <label for="inputAddress">Nombre(s)</label>
                        <input type="text" class="form-control" id="Nombres" v-model="nombres" required name="Nombres"
                            style="text-transform: capitalize;">
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6  was-validated">
                            <label for="inputCity">Apellido materno</label>
                            <input type="text" class="form-control" id="ApellidoM" v-model="ApellidoP" required
                                name="ApellidoP" style="text-transform: capitalize;">
                        </div>
                        <div class="form-group col-md-6 was-validated">
                            <label for="inputAddress2">Apellido paterno</label>
                            <input type="text" class="form-control" id="ApellidoP" v-model="ApellidoM" required
                                name="ApellidoM" style="text-transform: capitalize;">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 was-validated">
                            <label for="inputCity">Télefono de Contacto</label>
                            <input type="tel" class="form-control" id="Tel" required name="Tel" autocomplete="Tel">
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck" required>
                            <label class="form-check-label" for="gridCheck">
                                Al enviar la información confirmo que he leido y acepto el aviso de privacidad
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-start">
                        <button id="submit" type="submit" class="btn btn-primary"
                            style="background-color: #0160AE">Aceptar</button>
                        <!--
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        -->
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<script>
    var app = new Vue({
  el: '#Registro',
  data: {
    PerteneceUaslp:'',
    Pais:'',
    userInfo:'',
    emailR:'',
    nombres:'',
    ApellidoP:'',
    ApellidoM:'',
    passwordR:'',
    password:'',
    Errores:[],
    Facultad:'',
    spinnerVisible:false
  },
  mounted:function () {
  this.$nextTick(function () {
    // Código que se ejecutará solo después de
    // haber renderizado la vista completa
    this.Errores.push({Mensaje:" Lo sentimos tu RPE/Clave unica ó correo Institucional no se encuentra.",Visible:false});
    this.Errores.push({Mensaje:"Las contraseñas no coinciden",Visible:false});
  })
},
  methods:{
      //*Metodo para verificar que las contraseñas sean iguales*//
      RestableceValores:function(){
          if (this.PerteneceUaslp=="Si") {
          
          } else {
            this.emailR='';
            this.nombres='';
            this.ApellidoP='';
            this.ApellidoM='';
          }
      },
        VerificarContraseña:function(){
            if(this.password!=this.passwordR){
             this.Errores[1].Visible=true;
            }else{
                this.Errores[1].Visible=false;
            }
           
        },

        uaslpUser:function(){
            this.spinnerVisible=true;
           if(this.emailR!=''){
            var data = {
       	        "username":this.emailR
            }    
            }
        axios.post('https://ambiental.uaslp.mx/apiagenda/api/users/uaslp-user',data)
            .then(response => (
                this.spinnerVisible=false,
                this.nombres = response['data']['data']['name'],
                this.ApellidoM= response['data']['data']['last_surname'],
                this.ApellidoP= response['data']['data']['first_surname'],
                this.Pais="México",
                this.Facultad=response['data']['data']['Dependencia'],
                this.userInfo=response['data']['data'],
                this.emailR=response['data']['data']['email'],
                this.Errores[0].Visible=false)
                ).catch((err) => {
                    this.spinnerVisible=false,
                this.Errores[0].Visible=true;
                this.ApellidoM='';
                this.ApellidoP='';
                this.nombres='';
            })
    
         }
    }
})
</script>
@endsection