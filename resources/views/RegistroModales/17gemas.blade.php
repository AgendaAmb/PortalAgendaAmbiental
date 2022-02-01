<div class="modal fade" id="Registro17gemas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-primary" id="modalGemas">
          <h5 class="modal-title mx-auto" v-if="modalClick=='17Gemas'">17 gemas para la Uni sostenible</h5>
          <h5 class="modal-title mx-auto" v-if="modalClick=='mmus'">Movilidad urbana sustentable 2021</h5>
          <h5 class="modal-title mx-auto" v-if="modalClick=='Rodada'">Movilidad urbana sustentable 2021</h5>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="container-fluid bg-white"
          v-if="TipoUsuario!='externs'?hasModule17Gemas?modalClick=='17Gemas'?true:false:false:false ">
          <div class="row">
            <div class="col-12">
              <img src="{{asset('storage/imagenes/17Gemas/Banner_RegistroCompleto.png')}}" class="img-fluid mt-4"
                alt="">
            </div>
          </div>
        </div>


        <div class="modal-body"
          v-else-if="TipoUsuario=='externs'?false:modalClick!='Rodada'?true:isRegisterRodada?false:true">
          <form @submit.prevent="uaslpUser()">
            @csrf
            <h2 class="modal-title2" id="exampleModalLabel">Formulario de registro</h2>
            <br>
            <h5 class="modal-title3" id="exampleModalLabel" v-if="modalClick=='mmus'">Cursos o actividades en las que
              deseas participar</h5>

            <div id='ActividadesMMUS' v-if="modalClick=='mmus'">
              <!--
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="curso sostenibilidad" id="Conferencia1"
                  v-model="checkedNames">
                <label class="form-check-label" for="Conferencia1">
                  Conferencia: Sostenibilidad energética en la pandemia
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="curso movilidad y urbanismo" id="Conferencia2"
                  v-model="checkedNames">
                <label class="form-check-label" for="Conferencia2">
                  Conferencia: Movilidad y Urbanismo con enfoque de género
                </label>
              </div>
            -->
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="curso conduce con100te" id="con100te"
                  v-model="checkedNames">
                <label class="form-check-label" for="con100te">
                  Curso-taller: Conduce Con💯te
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="curso mus-uaslp" id="Trabajo"
                  v-model="checkedNames">
                <label class="form-check-label" for="Trabajo">
                  Segunda mesa de trabajo MUS-UASLP
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="curso cebratón y proyecto mus-zup" id="Cebraton"
                  v-model="checkedNames">
                <label class="form-check-label" for="Cebraton">
                  Intervenciones y reordenamiento: Cebratón y Proyecto MUS-ZUP
                </label>
              </div>
              <!--
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Unirodada cicloturística a la Cañada del Lobo"
                  id="Unirodada" v-model="checkedNames">
                <label class="form-check-label" for="Unirodada">
                  Unirodada cicloturística a la Cañada del Lobo
                </label>
              </div>
            -->
              <br>
            </div>
            <h5 class="modal-title3" id="exampleModalLabel">Datos personales</h5>
            <div class="form-group  was-validated">
              <label for="Nombres">Nombre(s)</label>
              <input type="text" class="form-control" id="Nombres" v-model="nombres" required name="Nombres" readonly
                style="text-transform: capitalize;">
            </div>
            <div class="form-row">
              <div class="form-group col-md-6 was-validated">
                <label for="ApellidoP">Apellido paterno</label>
                <input type="text" class="form-control" id="ApellidoP" v-model="ApellidoP" required readonly
                  name="ApellidoP" style="text-transform: capitalize;">
              </div>
              <div class="form-group col-md-6  was-validated">
                <label for="ApellidoM">Apellido materno</label>
                <input type="text" class="form-control" id="ApellidoM" v-model="ApellidoM" required readonly
                  name="ApellidoM" style="text-transform: capitalize;">
              </div>
            </div>


            <div class="form-group row was-validated">
              <label for="emailR" class="col-sm-3 col-form-label">Correo electrónico</label>
              <div class="col-9">
                <input type="emailR" class="form-control" id="emailR" required name="emailR" readonly v-model="emailR">
              </div>
            </div>
            <div class="form-row was-validated" v-if="TipoUsuario!='externs'?true:false">
              <div class="form-group col-md-6">
                <label for="ClaveU_RPE">clave única/RPE</label>
                <input type="text" name="ClaveU_RPE" class="form-control" id="ClaveU_RPE" readonly v-model="ClaveU_RPE"
                  required>
              </div>
              <div class=" form-group col-md-6" v-if="TipoUsuario!='externs'?true:false">
                <label for="Facultad">Facultad de adscripción</label>
                <input type="text" class="form-control" id="Facultad" required name="Facultad" readonly
                  v-model="Facultad">
              </div>
            </div>

            <div class="form-row row was-validated">
              <div class="col-md-6 mb-3">
                <label for="tel">Teléfono</label>
                <input type="tel" class="form-control" id="Tel" required name="Tel" v-model="tel"
                  @if(Auth::user()->user_type!="externs")

                @else
                readonly
                @endif
                >
              </div>


            </div>
            <div class="form-row row was-validated" v-if="modalClick!='Rodada'">
              <div class="col-md-6 mb-3">
                <label for="Pais">Nacionalidad</label>
                <select id="Pais" class="form-control" v-model="Pais" required name="Pais">
                  <option disabled value="">País</option>
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
                  <option value="Ciudad estado del Vaticano" id="VA">Ciudad estado del Vaticano
                  </option>
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
                  <option value="Ex-República Yugoslava de Macedonia" id="MK">Ex-República Yugoslava
                    de
                    Macedonia</option>
                  <option value="Filipinas" id="PH">Filipinas</option>
                  <option value="Finlandia" id="FI">Finlandia</option>
                  <option value="Francia" id="FR">Francia</option>
                  <option value="Gabón" id="GA">Gabón</option>
                  <option value="Gambia" id="GM">Gambia</option>
                  <option value="Georgia" id="GE">Georgia</option>
                  <option value="Georgia del Sur y las islas Sandwich del Sur" id="GS">Georgia del Sur
                    y
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
                  <option value="Isla Heard e Islas McDonald" id="HM">Isla Heard e Islas McDonald
                  </option>
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
                  <option value="Islas menores de Estados Unidos" id="UM">Islas menores de Estados
                    Unidos
                  </option>
                  <option value="Islas Palau" id="PW">Islas Palau</option>
                  <option value="Islas Salomón" d="SB">Islas Salomón</option>
                  <option value="Islas Tokelau" id="TK">Islas Tokelau</option>
                  <option value="Islas Turks y Caicos" id="TC">Islas Turks y Caicos</option>
                  <option value="Islas Vírgenes EE.UU." id="VI">Islas Vírgenes EE.UU.</option>
                  <option value="Islas Vírgenes Reino Unido" id="VG">Islas Vírgenes Reino Unido
                  </option>
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
                  <option value="República Democrática del Congo Zaire" id="CD">República Democrática
                    del
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
                  <option value="San Vicente e Islas Granadinas" id="VC">San Vicente e Islas
                    Granadinas
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
                  <option value="Territorios británicos del océano Indico" id="IO">Territorios
                    británicos
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
              <div class="col-md-6 mb-3" v-if="Pais === 'México'">
                <label for="CURP ">CURP</label>
                <input type="text" class="form-control" id="CURP" required style="text-transform: uppercase;"
                  maxlength="18" name="CURP" v-model="CURP" readonly>
              </div>

            </div>


            <hr>
            <h4 class="modal-title3 text-center"
              v-if="checkedNames.includes('Unirodada cicloturística a la Cañada del Lobo')">Datos de Unirodada</h4>
            <h5 class="modal-title3" v-if="checkedNames.includes('Unirodada cicloturística a la Cañada del Lobo')">
              Contacto de emergencia</h5>
            <div class="form-group row was-validated"
              v-if="checkedNames.includes('Unirodada cicloturística a la Cañada del Lobo')">
              <label for="emailR" class="col-sm-3 col-form-label">Nombre del contacto: </label>
              <div class="col-9">
                <input type="text" class="form-control" id="NombreContacto" required name="NombreContacto"
                  v-model="NombreContacto" @change="VerificaNombreContacto">
              </div>
              <span class="text-danger" role="alert" v-if="Errores[2].Visible">
                @{{Errores[2].Mensaje}}
              </span>
            </div>
            <div class="form-group row was-validated"
              v-if="checkedNames.includes('Unirodada cicloturística a la Cañada del Lobo')">
              <label for="emailR" class="col-sm-3 col-form-label">Teléfono de contacto </label>
              <div class="col-9">
                <input type="tel" class="form-control" id="CelularContacto" required name="CelularContacto"
                  v-model="CelularContacto" @change="VerificaNumeroContacto">
              </div>
              <span class="text-danger" role="alert" v-if="Errores[3].Visible">
                @{{Errores[3].Mensaje}}
              </span>
            </div>
            <div class="form-group row was-validated"
              v-if="checkedNames.includes('Unirodada cicloturística a la Cañada del Lobo')">

              <label for="GrupoC" class="col-sm-3 col-form-label">Grupo ciclista</label>
              <div class="col-9">
                <input type="text" class="form-control" id="GrupoC" name="GrupoC" v-model="GrupoC"
                  @change="ChecarBecas({{$fup_users}})">
              </div>
              <span class="text-danger" role="alert" v-if="Errores[5].Visible">
                @{{Errores[5].Mensaje}}
              </span>
              <span class="text-success" role="alert" v-if="Errores[4].Visible">
                @{{Errores[4].Mensaje}}
              </span>
            </div>
            <div class="form-group row " v-if="checkedNames.includes('Unirodada cicloturística a la Cañada del Lobo')">
              <div class="col-12">
                <div class="form-check form-check-inline">
                  <label class="form-check-label">Condicion de salud</label>
                </div>
                <div class="form-check form-check-inline ml-4">
                  <input class="form-check-input" type="checkbox" name="CondicionMala" id="CondicionMala"
                    value="CondicionMala" v-model="CondicionSalud" @click="check_one()">
                  <label class="form-check-label" for="CondicionMala">Mala</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" name="CondicionBuena" id="CondicionBuena"
                    value="CondicionBuena" v-model="CondicionSalud" @click="check_one()">
                  <label class="form-check-label" for="CondicionBuena">Buena</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" name="Excelente" id="Excelente" value="Excelente"
                    v-model="CondicionSalud" @click="check_one()">
                  <label class="form-check-label" for="CondicionExcelente">Excelente</label>
                </div>
              </div>

            </div>
            <hr>
            <h5 class="modal-title3" v-if="modalClick!='Rodada'">Información estadística</h5>
            <div class="form-group row was-validated" v-if="modalClick!='Rodada'">
              <label for="isAsistencia" class="col-sm-7 col-form-label">¿Has asistido a cursos ó talleres
                en
                la Agenda Ambiental?</label>
              <div class="col-5">
                <select id="isAsistencia" class="form-control" v-model="isAsistencia" required name="isAsistencia">
                  <option disabled value="">Opción</option>
                  <option value="Si" id="Si">Si</option>
                  <option value="No" id="No">No</option>
                </select>
              </div>
            </div>
            <div class="form-group row was-validated" v-if="modalClick!='Rodada'?isAsistencia==='Si'?true:false:false">
              <div class="col-md-12">
                <label for="CursosC">¿Cuales?</label>
                <input type="text" class="form-control" id="CursosC" required name="CursosC" v-model="CursosC">
              </div>
            </div>
            <div class="form-group row was-validated">
              <label for="InteresAsistencia" class="col-sm-12 col-form-label">¿Te interesaria seguir
                participando en actividades de la Agenda Ambiental?</label>
              <div class="col-12 col-xl-5">
                <select id="InteresAsistencia" class="form-control" v-model="InteresAsistencia" required
                  name="InteresAsistencia">
                  <option disabled value="">Opción</option>
                  <option value="Si" id="Si">Si</option>
                  <option value="No" id="No">No</option>
                </select>
              </div>
            </div>
            <div class="form-group row " v-if="modalClick!='Rodada'">
              <label for="ComentariosSugerencias" class="col-sm-12 col-form-label">Comentarios o
                suguerencias</label>
              <div class="col-md-12">
                <textarea name="ComentariosSugerencias" id="ComentariosSugerencias" rows="5" class="form-control"
                  v-model="ComentariosSugerencias">
                </textarea>
              </div>
            </div>

            <div class="form-group ">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck" required>
                <label class="form-check-label" for="gridCheck">
                  Al enviar la información confirmo que he leído y acepto el
                  <a href="http://transparencia.uaslp.mx/avisodeprivacidad"> aviso de privacidad.</a>

                </label>
              </div>
            </div>

            <div class="modal-footer justify-content-start">
              <button id="submit" type="submit" class="btn btn-primary" style="background-color: #0160AE"
                v-if="!spinnerVisible">Aceptar</button>
              <button class="btn btn-primary" type="button" disabled v-if="spinnerVisible">
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                Registrando...
              </button>
              <div class="alert alert-success" role="alert" v-if="Guardado">
                ¡¡Te has registrado con exito!!
              </div>
            </div>

          </form>
        </div>
        <div class="modal-body" v-else>
          <img src="{{asset('/storage/imagenes/mmus2021/RegistroCerradoRodada.png')}}" class="img-fluid" alt="">
        </div>

      </div>
    </div>
  </div>