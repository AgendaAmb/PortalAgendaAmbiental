/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************************!*\
  !*** ./resources/js/Dashboard/dashboard.js ***!
  \*********************************************/
var _data;

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

var app = new Vue({
  el: '#panel',
  data: (_data = {
    ClaveU_RPE: '',
    Pais: '',
    userInfo: '',
    emailR: '',
    nombres: '',
    ApellidoP: '',
    ApellidoM: '',
    Errores: [],
    Facultad: '',
    spinnerVisible: false,
    CURP: '',
    LugarResidencia: '',
    profesion: '',
    organizacion: '',
    isDiscapacidad: '',
    Discapacidad: '',
    Genero: '',
    isAsistencia: '',
    CursosC: '',
    InteresAsistencia: '',
    ComentariosSugerencias: '',
    tel: '',
    modalClick: '',
    TipoUsuario: '',
    checkedNames: [],
    hasModule17Gemas: false,
    CondicionSalud: [],
    NombreContacto: '',
    CelularContacto: '',
    cursosInscritos: [],
    Guardado: '',
    isRegisterRodada: false,
    GrupoC: '',
    asistenciaExito: '',
    file: '',
    isFacturaReq: '',
    nombresF: '',
    RFC: '',
    DomicilioF: '',
    emailF: '',
    telF: '',
    nombreT: '',
    DescripcionT: '',
    TEvento: '',
    Eje: '',
    FechaInicio: '',
    FechaFin: '',
    checkedFecha: [],
    NAcademico: '',
    Especificar: '',
    //variables para unitrueque
    MaterialesIntercambio: '',
    Cantidad: '',
    Mobiliario: '',
    //si o no
    EmpresaParticipante: '',
    //! Modales pasados
    InscritoHuertoMesaHuasteca: false,
    InscritoPromotoresHuasteca: false,
    InscritoUnirodadaRios: false,
    InscritoUniruta: false
  }, _defineProperty(_data, "InscritoUniruta", false), _defineProperty(_data, "InscritoUnihuertoCasa", false), _defineProperty(_data, "InscritoHuertoMesa", false), _defineProperty(_data, "InscritoGGJ", false), _defineProperty(_data, "InscritoUnitrueque", false), _defineProperty(_data, "InscritoCA_complete", false), _defineProperty(_data, "REGS", false), _defineProperty(_data, "RIA", false), _defineProperty(_data, "SCMU", false), _defineProperty(_data, "Selected_REGS", false), _defineProperty(_data, "Selected_RIA", false), _defineProperty(_data, "Selected_SCMU", false), _defineProperty(_data, "teamlength", 3), _defineProperty(_data, "team", new Array()), _data),
  mounted: function mounted() {
    this.$nextTick(function () {
      // Initial team
      this.team.push({
        name: '',
        email: '',
        tel: '',
        inst: '',
        nedu: 'Nivel superior'
      });
      this.team.push({
        name: '',
        email: '',
        tel: '',
        inst: '',
        nedu: 'Nivel superior'
      });
      this.team.push({
        name: '',
        email: '',
        tel: '',
        inst: '',
        nedu: 'Nivel superior'
      }); // 

      this.cargarCursos(), this.checarAsistenciaCursos(), this.ChecarUrl(), this.TipoUsuario = '{{Auth::user()->user_type}}', this.Errores.push({
        Mensaje: " Lo sentimos algo a pasado y no te hemos podido registrar",
        Visible: false
      });
      this.Errores.push({
        Mensaje: "Las contraseñas no coinciden",
        Visible: false
      });
      this.Errores.push({
        Mensaje: "El nombre del contacto debe ser diferente al tuyo",
        Visible: false
      });
      this.Errores.push({
        Mensaje: "El teléfono y el teléfono de contacto no pueden ser iguales",
        Visible: false
      });
      this.Errores.push({
        Mensaje: "Eres acredor a una beca por parte de Agenda Ambiental",
        Visible: false
      });
      this.Errores.push({
        Mensaje: "Lo sentimos se ha alcanzado el limite de becas aprobadas y tu registro necesitara realizar el pago.",
        Visible: false
      });
    });
  },
  methods: {
    addTeamMember: function addTeamMember() {
      if (this.teamlength < 5) {
        var user_Data = {
          name: '',
          email: '',
          tel: '',
          inst: '',
          nedu: 'Nivel superior'
        };
        this.team.push(user_Data);
        console.log(this.team);
        this.teamlength += 1;
      }
    },
    deleteTeamMember: function deleteTeamMember(index) {
      if (this.teamlength > 1) {
        this.team.splice(index, 1);
      }

      this.teamlength = -1;
      console.log(this.team);
    },
    registrarWorshop: function registrarWorshop() {
      var _this = this;

      this.spinnerVisible = true;
      var formData = new FormData();
      formData.append('idUser', '{{Auth::id()}}');
      formData.append('nombreT', this.nombreT);
      formData.append('DescripcionT', this.DescripcionT);
      formData.append('TEvento', this.TEvento);
      formData.append('Eje', this.Eje);
      formData.append('FechaInicio', this.FechaInicio);
      formData.append('FechaFin', this.FechaFin);
      formData.append('_method', 'post');
      axios({
        method: 'post',
        url: 'api/registerWorkShop',
        data: formData,
        headers: {
          'Content-Type': 'multipart/form-data'
        }
      }).then(function (res) {
        _this.file = '', _this.spinnerVisible = false, _this.asistenciaExito = true;
      })["catch"](function (err) {
        _this.spinnerVisible = false, _this.asistenciaExito = false;
      });
    },
    ChecarBecas: function ChecarBecas(fupUser) {
      console.log(fupUser);
      this.Errores[4].Visible = false;
      this.Errores[5].Visible = false;

      if (this.GrupoC.toUpperCase().replace(/ /g, "") == 'FUP') {
        if (fupUser >= 10) {
          this.Errores[5].Visible = true;
        } else {
          this.Errores[4].Visible = true;
        }
      } else if (this.GrupoC.toUpperCase().replace(/ /g, "") == 'STAFF') {
        this.Errores[4].Visible = true;
        console.log("SOY DE STAFF");
      }
    },
    cargarPdf: function cargarPdf(e, index) {
      this.file = '';
      this.file = e.target.files[0];
    },
    MandarPagoUnirodada: function MandarPagoUnirodada() {
      var _this2 = this;

      this.spinnerVisible = true;
      var formData = new FormData();
      formData.append('idUser', '{{Auth::id()}}');
      formData.append('isFacturaReq', this.isFacturaReq);
      formData.append('DomicilioF', this.DomicilioF);
      formData.append('emailF', this.emailF);
      formData.append('nombresF', this.nombresF);
      formData.append('RFC', this.RFC);
      formData.append('telF', this.telF);
      formData.append('file', this.file);
      formData.append('_method', 'post');
      axios({
        method: 'post',
        url: '/EnviaComprobante',
        data: formData,
        headers: {
          'Content-Type': 'multipart/form-data'
        }
      }).then(function (res) {
        console.log(response.data), _this2.file = '', _this2.spinnerVisible = false, _this2.asistenciaExito = true;
      })["catch"](function (err) {
        _this2.spinnerVisible = false, _this2.asistenciaExito = false;
      });
    },
    VerificaNumeroContacto: function VerificaNumeroContacto() {
      if (this.CelularContacto == this.tel) {
        this.Errores[3].Visible = true;
      } else {
        this.Errores[3].Visible = false;
      }
    },
    VerificaNombreContacto: function VerificaNombreContacto() {
      nombreCompleto = this.nombres + this.ApellidoP + this.ApellidoM;

      if (nombreCompleto == this.NombreContacto) {
        this.Errores[2].Visible = true;
      } else {
        this.Errores[2].Visible = false;
      }
    },
    ChecarUrl: function ChecarUrl() {
       false ? 0 : '';
       false ? 0 : '';
       false ? 0 : '';
       false ? 0 : '';
       false ? 0 : '';
       false ? 0 : '';
    },
    levantaModal: function levantaModal(data) {
      this.DatosUsuario(data), // Checar usuario registrado
      this.checarInscripcionCursosAct();
      this.checarInscripcionUnitrueque();
      this.checarInscripcionHuertoMesa();
      this.checarInscripcionGGJ();
      $('#' + data).modal('show');
    },
    activaModal: function activaModal() {
      //*urlanterior
      var fechaRegistro = new Date('{{Auth::user()->created_at}}');
      var hora = new Date();
      var diferencia = Math.abs(hora - fechaRegistro);
      var diasDiferencia = Math.ceil(diferencia / (1000 * 60 * 60 * 24));
      console.log(diasDiferencia);

      if (diasDiferencia > 1) {} else {
        this.DatosUsuario('mmus'), $('#Registro17gemas').modal('show');
      }
    },
    checarAsistenciaCursos: function checarAsistenciaCursos() {
      this.CursosC = '{{Auth::user()->courses}}', this.CursosC == null ? this.isAsistencia = 'No' : this.CursosC == '' ? this.isAsistencia = '' : this.isAsistencia = 'Si';
    },
    check_one: function check_one() {
      this.CondicionSalud = [];
    },
    check_two: function check_two() {
      this.checkedFecha = [];
    },
    AbrirModal: function AbrirModal(ModalClick) {
      //esta funcion setea los datos del usuario segun el modal que se dio click
      this.DatosUsuario(ModalClick); //Modales vigentes

      this.checarInscripcionCursosAct();
      this.checarInscripcionUnitrueque();
      this.checarInscripcionHuertoMesa();
      this.checarInscripcionGGJ(); //Modales pasados
      // this.checarInscripcionUnihuertoCasa();
      // this.checarInscripcionHuertoMesaHuasteca();
      // this.checarInscripcionPromotoresHuasteca();
      // this.checarInscripcionUnirodadaRios();
      // this.checarInscripcionUniruta();

      $('#' + ModalClick).modal('show');
    },
    DatosUsuario: function DatosUsuario(ModalClick) {
      this.nombres = '{{Auth::user()->name}}', this.ApellidoP = '{{Auth::user()->middlename}}', this.ApellidoM = '{{Auth::user()->surname}}', this.emailR = '{{Auth::user()->email}}', this.Pais = '{{Auth::user()->nationality}}', this.CURP = '{{Auth::user()->curp}}', this.ClaveU_RPE = '{{Auth::user()->id}}', this.tel = '{{Auth::user()->phone_number}}', this.Facultad = '{{Auth::user()->dependency}}', this.modalClick = ModalClick, this.Genero = '{{Auth::user()->gender}}', this.LugarResidencia = '{{Auth::user()->residence}}', this.hasModule17Gemas = '{{Auth::user()->hasModule("17 gemas")}}', this.InteresAsistencia = '{{Auth::user()->interested_on_further_courses}}', this.CondicionSalud = '{{Auth::user()->health_condition}}', this.ComentariosSugerencias = '{{Auth::user()->comments}}', this.NombreContacto = '{{Auth::user()->emergency_contact}}';
      this.CelularContacto = '{{Auth::user()->emergency_contact_phone}}', this.Guardado = false, this.url = url, this.Ocupacion = '{{Auth::user()->ocupation}}';

      if (this.checkedNames.includes("Unirodada cicloturística a la Cañada del Lobo")) {
        this.isRegisterRodada = true, this.check_one(), this.CondicionSalud = '{{Auth::user()->health_condition}}';
      }
    },
    registerGgj: function registerGgj() {
      var _this3 = this;

      var headers = {
        'Content-Type': 'application/json;charset=utf-8'
      };
      var data = {
        "team": this.team,
        "teamlength": this.teamlength,
        "InteresAsistencia": this.InteresAsistencia
      };
      axios.post(this.url + 'RegistrarGGJ', data).then(function (response) {
        return console.log(response.data), _this3.spinnerVisible = false, $('#GlobalGoalsJam').modal('hide'), _this3.Guardado = true;
      })["catch"](function (err) {
        console.log(err), _this3.Guardado = false;
      });
    },
    uaslpUser: function uaslpUser() {
      var _this4 = this;

      this.spinnerVisible = true;

      if (this.emailR != '') {
        var headers = {
          'Content-Type': 'application/json;charset=utf-8'
        };
        var data = {
          "emailR": this.emailR,
          "Genero": this.Genero,
          "Clave": this.ClaveU_RPE,
          "FacultadAdscripcion": this.Facultad,
          "Tel": this.tel,
          "Nacionalidad": this.Pais,
          "LugarResidencia": this.LugarResidencia,
          "CURP": this.CURP,
          "Ocupacion": this.Ocupacion,
          "CursoCursado": this.CursosC,
          "ComentariosSugerencias": this.ComentariosSugerencias,
          "InteresAsistencia": this.InteresAsistencia,
          "cursosInscritosMMUS": this.checkedNames,
          "CondicionSalud": this.CondicionSalud,
          "NombreContacto": this.NombreContacto,
          "CelularContacto": this.CelularContacto,
          "GrupoC": this.GrupoC,
          "NAcademico": this.NAcademico,
          "checkedFecha": this.checkedFecha,
          "isFacturaReq": this.isFacturaReq,
          'DomicilioF': this.DomicilioF,
          'emailF': this.emailF,
          'nombresF': this.nombresF,
          'RFC': this.RFC,
          'telF': this.telF,
          'isAsistencia': this.isAsistencia,
          //campos para unitrueque
          'MaterialesIntercambio': this.MaterialesIntercambio,
          'Cantidad': this.Cantidad,
          'Mobiliario': this.Mobiliario,
          'EmpresaParticipante': this.EmpresaParticipante,
          'profesion': this.profesion,
          'organizacion': this.organizacion
        };

        if (this.modalClick == 'Agricultura') {
          axios.post(this.url + 'RegistrarTallerUsuario', data).then(function (response) {
            return console.log(response.data), _this4.spinnerVisible = false, $('#RegistroAgricultura').modal('hide'), $('#Registro17gemas').modal('hide'), _this4.Guardado = true;
          })["catch"](function (err) {
            _this4.Errores[0].Visible, _this4.Guardado = false;
          });
        } else if (this.modalClick == '17Gemas') {
          axios.post(this.url + '17Gemas/api/register', data).then(function (response) {
            return _this4.spinnerVisible = false, window.location.href = _this4.url + '17Gemas/';
          })["catch"](function (err) {
            _this4.Errores[0].Visible;
          });
        } else if (this.modalClick == 'mmus') {
          //*Ruta para guardar informacion de un usuario y sus cursos o concursos inscritos*//
          axios.post(this.url + 'RegistrarTallerUsuario', data).then(function (response) {
            return console.log(response.data), _this4.spinnerVisible = false, $('#Registro17gemas').modal('hide'), _this4.Guardado = true;
          })["catch"](function (err) {
            _this4.Errores[0].Visible, _this4.Guardado = false;
          });
        } else if (this.modalClick == 'UnihuertoCasa') {
          //*Ruta para guardar informacion de un usuario y sus cursos o concursos inscritos*//
          axios.post(this.url + 'RegistrarUnihuertoCasaUsuario', data).then(function (response) {
            console.log(response.status);

            if (response.status == 200) {
              //console.log(response.data);
              _this4.spinnerVisible = false;
              $('#UnihuertoCasa').modal('hide');
              _this4.Guardado = true;
            } else {
              console.log("Mensaje: " + response.data.Message);
            }
          })["catch"](function (err) {
            console.log(err);
            if (err.response.data.Message) console.log("Mensaje: " + err.response.data.Message);
            _this4.Errores[0].Visible;
            _this4.Guardado = false;
          });
        } else if (this.modalClick == 'HuertoMesa') {
          //*Ruta para guardar informacion de un usuario y sus cursos o concursos inscritos*//
          axios.post(this.url + 'RegistrarHuertoMesaUsuario', data).then(function (response) {
            console.log(response.status);

            if (response.status == 200) {
              //console.log(response.data);
              _this4.spinnerVisible = false;
              $('#HuertoMesa').modal('hide');
              _this4.Guardado = true;
            } else {
              console.log("Mensaje: " + response.data.Message);
            }
          })["catch"](function (err) {
            console.log(err);
            if (err.response.data.Message) console.log("Mensaje: " + err.response.data.Message);
            _this4.Errores[0].Visible;
            _this4.Guardado = false;
          });
        } else if (this.modalClick == 'Unitrueque') {
          //*Ruta para guardar informacion de un usuario y sus cursos o concursos inscritos*//
          axios.post(this.url + 'RegistrarUnitruequeUsuario', data).then(function (response) {
            console.log(response.status);

            if (response.status == 200) {
              console.log(response.data);
              _this4.spinnerVisible = false;
              $('#Unitrueque').modal('hide');
              _this4.Guardado = true;
            } else {
              console.log("Mensaje: " + response.data.Message);
            }
          })["catch"](function (err) {
            console.log(err);
            if (err.response.data.Message) console.log("Mensaje: " + err.response.data.Message);
            _this4.Errores[0].Visible;
            _this4.Guardado = false;
          });
        } else if (this.modalClick == 'HuertoMesaHuasteca') {
          //*Ruta para guardar informacion de un usuario y sus cursos o concursos inscritos*//
          axios.post(this.url + 'RegistrarHuertoMesaHuastecaUsuario', data).then(function (response) {
            console.log(response.status);

            if (response.status == 200) {
              //console.log(response.data);
              _this4.spinnerVisible = false;
              $('#HuertoMesaHuasteca').modal('hide');
              _this4.Guardado = true;
            } else {
              console.log("Mensaje: " + response.data.Message);
            }
          })["catch"](function (err) {
            console.log(err);
            if (err.response.data.Message) console.log("Mensaje: " + err.response.data.Message);
            _this4.Errores[0].Visible;
            _this4.Guardado = false;
          });
        } else if (this.modalClick == 'PromotoresHuasteca') {
          //*Ruta para guardar informacion de un usuario y sus cursos o concursos inscritos*//
          axios.post(this.url + 'RegistrarPromotoresHuastecaUsuario', data).then(function (response) {
            console.log(response.status);

            if (response.status == 200) {
              //console.log(response.data);
              _this4.spinnerVisible = false;
              $('#PromotoresHuasteca').modal('hide');
              _this4.Guardado = true;
            } else {
              console.log("Mensaje: " + response.data.Message);
            }
          })["catch"](function (err) {
            console.log(err);
            if (err.response.data.Message) console.log("Mensaje: " + err.response.data.Message);
            _this4.Errores[0].Visible;
            _this4.Guardado = false;
          });
        } else if (this.modalClick == 'UnirodadaRios') {
          data['TipoEvento'] = 'unirodada'; //*Ruta para guardar informacion de un usuario y sus cursos o concursos inscritos*//

          axios.post(this.url + 'RegistrarRodadaRioUsuario', data).then(function (response) {
            console.log(response.status);

            if (response.status == 200) {
              //console.log(response.data);
              _this4.spinnerVisible = false;
              $('#UnirodadaRios').modal('hide');
              _this4.Guardado = true;
            } else {
              console.log("Mensaje: " + response.data.Message);
            }
          })["catch"](function (err) {
            console.log(err);
            if (err.response.data.Message) console.log("Mensaje: " + err.response.data.Message);
            _this4.Errores[0].Visible;
            _this4.Guardado = false;
          });
        } else if (this.modalClick == 'UnirutaSierraAlvarez') {
          // console.log(data);
          data['TipoEvento'] = 'uniruta'; //*Ruta para guardar informacion de un usuario y sus cursos o concursos inscritos*//

          axios.post(this.url + 'RegistrarUnirutaUsuario', data).then(function (response) {
            console.log(response.status);

            if (response.status == 200) {
              //console.log(response.data);
              _this4.spinnerVisible = false;
              $('#UnirutaSierraAlvarez').modal('hide');
              _this4.Guardado = true;
            } else {
              console.log("Mensaje: " + response.data.Message);
            }
          })["catch"](function (err) {
            console.log(err);
            if (err.response.data.Message) console.log("Mensaje: " + err.response.data.Message);
            _this4.Errores[0].Visible;
            _this4.Guardado = false;
          });
        } else if (this.modalClick == 'CursosActualizacion') {
          // console.log('REGS: ');
          // console.log(this.Selected_REGS);
          data['REGS'] = this.Selected_REGS;
          data['RIA'] = this.Selected_RIA;
          data['SCMU'] = this.Selected_SCMU;
          data['TipoEvento'] = 'curso';
          console.log(data); //*Ruta para guardar informacion de un usuario y sus cursos o concursos inscritos*//

          axios.post(this.url + 'RegistrarCAUsuario', data).then(function (response) {
            if (response.status == 200) {
              console.log(response.data.Message);
              _this4.spinnerVisible = false;
              $('#CursosActualizacion').modal('hide');
              _this4.Guardado = true;
            } else {
              console.log("Mensaje: " + response.data.Message);
            }
          })["catch"](function (err) {
            console.log(err);
            if (err.response.data.Message) console.log("Mensaje: " + err.response.data.Message);
            _this4.Errores[0].Visible;
            _this4.Guardado = false;
          });
        } else {
          data['TipoEvento'] = 'unirodada';
          axios.post(this.url + 'RegistrarTallerUsuario', data).then(function (response) {
            return console.log(response.data), _this4.spinnerVisible = false, $('#Registro17gemas').modal('hide'), _this4.Guardado = true;
          })["catch"](function (err) {
            _this4.Errores[0].Visible;
          });
        }
      }
    },
    //Verifica la inscripcion en cursos de actualizacion
    checarInscripcionGGJ: function checarInscripcionGGJ() {
      var _this5 = this;

      axios.post(this.url + 'ChecarGGJ', {
        "Clave": '{{Auth::user()->id}}'
      }).then(function (response) {
        console.log(response.data);
        _this5.InscritoGGJ = response.data;
      })["catch"](function (err) {
        console.log(err.response);
      });
    },
    //Verifica la inscripcion en cursos de actualizacion
    checarInscripcionCursosAct: function checarInscripcionCursosAct() {
      var _this6 = this;

      axios.post(this.url + 'ChecarCAUsuario', {
        "Clave": this.ClaveU_RPE
      }).then(function (response) {
        // console.log(response.data);
        _this6.REGS = response.data.data.REGS;
        _this6.RIA = response.data.data.RIA;
        _this6.SCMU = response.data.data.SCMU;
        _this6.InscritoCA_complete = response.data.flag;
      })["catch"](function (err) {
        console.log(err.response);
      });
    },
    checarInscripcionHuertoMesaHuasteca: function checarInscripcionHuertoMesaHuasteca() {
      var _this7 = this;

      axios.post(this.url + 'ChecarHuertoMesaHuastecaUsuario', {
        "Clave": this.ClaveU_RPE
      }).then(function (response) {
        // console.log(response.data);
        _this7.InscritoHuertoMesaHuasteca = response.data;
      })["catch"](function (err) {
        console.log(err.response.data);
      });
    },
    checarInscripcionPromotoresHuasteca: function checarInscripcionPromotoresHuasteca() {
      var _this8 = this;

      axios.post(this.url + 'ChecarPromotoresHuastecaUsuario', {
        "Clave": this.ClaveU_RPE
      }).then(function (response) {
        // console.log(response.data);
        _this8.InscritoPromotoresHuasteca = response.data;
      })["catch"](function (err) {
        console.log(err.response.data);
      });
    },
    checarInscripcionUnirodadaRios: function checarInscripcionUnirodadaRios() {
      var _this9 = this;

      axios.post(this.url + 'ChecarRodadaRioUsuario', {
        "Clave": this.ClaveU_RPE
      }).then(function (response) {
        // console.log("Rodada rio: " + response.data);
        _this9.InscritoUnirodadaRios = response.data;
      })["catch"](function (err) {
        console.log(err.response.data);
      });
    },
    checarInscripcionUniruta: function checarInscripcionUniruta() {
      var _this10 = this;

      axios.post(this.url + 'ChecarUnirutaUsuario', {
        "Clave": this.ClaveU_RPE
      }).then(function (response) {
        // console.log("Uniruta: " + response.data);
        _this10.InscritoUniruta = response.data;
      })["catch"](function (err) {
        console.log(err.response.data);
      });
    },
    checarCursosActualizacion: function checarCursosActualizacion() {
      var _this11 = this;

      axios.post(this.url + 'ChecarCursoaUsuario', {
        "Clave": this.ClaveU_RPE
      }).then(function (response) {
        // console.log("Uniruta: " + response.data);
        _this11.InscritoCursosa = response.data;
      })["catch"](function (err) {
        console.log(err.response.data);
      });
    },
    checarInscripcionHuertoMesa: function checarInscripcionHuertoMesa() {
      var _this12 = this;

      axios.post(this.url + 'ChecarHuertoMesaUsuario', {
        "Clave": this.ClaveU_RPE
      }).then(function (response) {
        // console.log(response.data);
        _this12.InscritoHuertoMesa = response.data;
      })["catch"](function (err) {
        console.log(err.response.data);
      });
    },
    checarInscripcionUnihuertoCasa: function checarInscripcionUnihuertoCasa() {
      var _this13 = this;

      axios.post(this.url + 'ChecarUnihuertoCasaUsuario', {
        "Clave": this.ClaveU_RPE
      }).then(function (response) {
        _this13.InscritoUnihuertoCasa = response.data;
      })["catch"](function (err) {
        console.log(err);
      });
    },
    checarInscripcionUnitrueque: function checarInscripcionUnitrueque() {
      var _this14 = this;

      axios.post(this.url + 'ChecarUnitruequeUsuario', {
        "Clave": this.ClaveU_RPE
      }).then(function (response) {
        _this14.InscritoUnitrueque = response.data;
      })["catch"](function (err) {
        console.log(err);
      });
    }
  }
});
/******/ })()
;