var galeriaManagerObj ={
}
galeriaManagerObj._self=null;

galeriaManagerObj ={
	
	_init: function (){
		this._self =this;
		this._ids = [];
		this._position=0;
	},	
	showFotoDesc: function(id){
		wait();
		document.getElementById("titol_foto").innerHTML= window.localStorage.getItem("foto_titol_"+id);
		document.getElementById("subtitol_foto").innerHTML= window.localStorage.getItem("foto_subtitol_"+id);
		document.getElementById("desc_foto").innerHTML=  window.localStorage.getItem("foto_desc_"+id);
		document.getElementById('img_id').src =document.getElementById('img_'+id).src;
	},
	next: function(){
		galeriaManagerObj._position = galeriaManagerObj._position+1;
		if(galeriaManagerObj._position >= galeriaManagerObj._ids.length-1 ){
			galeriaManagerObj._position=0;
		}
		document.getElementById("titol_foto").innerHTML= window.localStorage.getItem("foto_titol_"+galeriaManagerObj._ids[galeriaManagerObj._position]);
		document.getElementById("subtitol_foto").innerHTML= window.localStorage.getItem("foto_subtitol_"+galeriaManagerObj._ids[galeriaManagerObj._position]);
		document.getElementById("desc_foto").innerHTML=  window.localStorage.getItem("foto_desc_"+galeriaManagerObj._ids[galeriaManagerObj._position]);
		document.getElementById('img_id').src =document.getElementById('img_'+galeriaManagerObj._ids[galeriaManagerObj._position]).src;
	},
	previous: function(){
		galeriaManagerObj._position = galeriaManagerObj._position-1;
		if(galeriaManagerObj._position < 0 ){
			galeriaManagerObj._position=galeriaManagerObj._ids.length-1;
		}
		document.getElementById("titol_foto").innerHTML= window.localStorage.getItem("foto_titol_"+galeriaManagerObj._ids[galeriaManagerObj._position]);
		document.getElementById("subtitol_foto").innerHTML= window.localStorage.getItem("foto_subtitol_"+galeriaManagerObj._ids[galeriaManagerObj._position]);
		document.getElementById("desc_foto").innerHTML=  window.localStorage.getItem("foto_desc_"+galeriaManagerObj._ids[galeriaManagerObj._position]);
		document.getElementById('img_id').src =document.getElementById('img_'+galeriaManagerObj._ids[galeriaManagerObj._position]).src;
	},
	saveInfo: function(id,titol,subtitol,descripcio,data){
		galeriaManagerObj._ids.push(id);
		window.localStorage.setItem("foto_titol_"+id,titol);
		window.localStorage.setItem("foto_subtitol_"+id,subtitol);
		window.localStorage.setItem("foto_desc_"+id,descripcio);
		window.localStorage.setItem("foto_data_"+id,data);
	},
}
//inizialize objects
galeriaManagerObj._init();