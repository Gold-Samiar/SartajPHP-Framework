var servfindex = 0;
var strprocess = "";
// returndatatype variable
var returndataobj;

$.fn.getJSON = function(){
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name]) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};
$.fn.JSONtoString = function(){
o = "[";
$.each(this, function(key,val) {
o += "," + JSON.stringify(val);
    });
    o += "]";
    return o;
};

    $.fn.sleep = function(time){  
        var i = $(this);  
        i.queue(function(){  
            setTimeout(function(){ 
                i.dequeue(); 
            }, time);  
        });  
    };  

(function( $ ) {
	// Several of the methods in this plugin use code adapated from Prototype
	//  Prototype JavaScript framework, version 1.6.0.1
	//  (c) 2005-2007 Sam Stephenson
	var regs = {
		undHash: /_|-/,
		colons: /::/,
		words: /([A-Z]+)([A-Z][a-z])/g,
		lowUp: /([a-z\d])([A-Z])/g,
		dash: /([a-z\d])([A-Z])/g,
		replacer: /\{([^\}]+)\}/g,
		dot: /\./
	},
		getNext = function(current, nextPart, add){
			return current[nextPart] || ( add && (current[nextPart] = {}) );
		},
		isContainer = function(current){
			var type = typeof current;
			return type && (  type == 'function' || type == 'object' );
		},
		getObject = function( objectName, roots, add ) {
			
			var parts = objectName ? objectName.split(regs.dot) : [],
				length =  parts.length,
				currents = $.isArray(roots) ? roots : [roots || window],
				current,
				ret, 
				i,
				c = 0,
				type;
			
			if(length == 0){
				return currents[0];
			}
			while(current = currents[c++]){
				for (i =0; i < length - 1 && isContainer(current); i++ ) {
					current = getNext(current, parts[i], add);
				}
				if( isContainer(current) ) {
					
					ret = getNext(current, parts[i], add); 
					
					if( ret !== undefined ) {
						
						if ( add === false ) {
							delete current[parts[i]];
						}
						return ret;
						
					}
					
				}
			}
		},

		str = $.String = $.extend( $.String || {} , {
			getObject : getObject,
			capitalize: function( s, cache ) {
				return s.charAt(0).toUpperCase() + s.substr(1);
			},
			camelize: function( s ) {
				s = str.classize(s);
				return s.charAt(0).toLowerCase() + s.substr(1);
			},
			classize: function( s , join) {
				var parts = s.split(regs.undHash),
					i = 0;
				for (; i < parts.length; i++ ) {
					parts[i] = str.capitalize(parts[i]);
				}

				return parts.join(join || '');
			},
			niceName: function( s ) {
				str.classize(parts[i],' ');
			},

			underscore: function( s ) {
				return s.replace(regs.colons, '/').replace(regs.words, '$1_$2').replace(regs.lowUp, '$1_$2').replace(regs.dash, '_').toLowerCase();
			},
			sub: function( s, data, remove ) {
				var obs = [];
				obs.push(s.replace(regs.replacer, function( whole, inside ) {
					//convert inside to type
					var ob = getObject(inside, data, typeof remove == 'boolean' ? !remove : remove),
						type = typeof ob;
					if((type === 'object' || type === 'function') && type !== null){
						obs.push(ob);
						return "";
					}else{
						return ""+ob;
					}
				}));
				return obs.length <= 1 ? obs[0] : obs;
			}
		});

})(jQuery);
(function( $ ) {

	// if we are initializing a new class
	var initializing = false,
		makeArray = $.makeArray,
		isFunction = $.isFunction,
		isArray = $.isArray,
		extend = $.extend,
		concatArgs = function(arr, args){
			return arr.concat(makeArray(args));
		},
		// tests if we can get super in .toString()
		fnTest = /xyz/.test(function() {
			xyz;
		}) ? /\b_super\b/ : /.*/,
		inheritProps = function( newProps, oldProps, addTo ) {
			addTo = addTo || newProps
			for ( var name in newProps ) {
				// Check if we're overwriting an existing function
				addTo[name] = isFunction(newProps[name]) && 
							  isFunction(oldProps[name]) && 
							  fnTest.test(newProps[name]) ? (function( name, fn ) {
					return function() {
						var tmp = this._super,
							ret;
						this._super = oldProps[name];
						ret = fn.apply(this, arguments);
						this._super = tmp;
						return ret;
					};
				})(name, newProps[name]) : newProps[name];
			}
		},

	clss = $.Class = function() {
		if (arguments.length) {
			clss.extend.apply(clss, arguments);
		}
	};

	/* @Static*/
	extend(clss, {
		callback: function( funcs ) {

			//args that should be curried
			var args = makeArray(arguments),
				self;

			funcs = args.shift();

			if (!isArray(funcs) ) {
				funcs = [funcs];
			}

			self = this;
			
			return function class_cb() {
				var cur = concatArgs(args, arguments),
					isString, 
					length = funcs.length,
					f = 0,
					func;

				for (; f < length; f++ ) {
					func = funcs[f];
					if (!func ) {
						continue;
					}

					isString = typeof func == "string";
					if ( isString && self._set_called ) {
						self.called = func;
					}
					cur = (isString ? self[func] : func).apply(self, cur || []);
					if ( f < length - 1 ) {
						cur = !isArray(cur) || cur._use_call ? [cur] : cur
					}
				}
				return cur;
			}
		},
		getObject: $.String.getObject,
		newInstance: function() {
			var inst = this.rawInstance(),
				args;
			if ( inst.setup ) {
				args = inst.setup.apply(inst, arguments);
			}
			if ( inst.init ) {
				inst.init.apply(inst, isArray(args) ? args : arguments);
			}
			return inst;
		},
		setup: function( baseClass, fullName ) {
			this.defaults = extend(true, {}, baseClass.defaults, this.defaults);
			return arguments;
		},
		rawInstance: function() {
			initializing = true;
			var inst = new this();
			initializing = false;
			return inst;
		},
		extend: function( fullName, klass, proto ) {
			// figure out what was passed
			if ( typeof fullName != 'string' ) {
				proto = klass;
				klass = fullName;
				fullName = null;
			}
			if (!proto ) {
				proto = klass;
				klass = null;
			}

			proto = proto || {};
			var _super_class = this,
				_super = this.prototype,
				name, shortName, namespace, prototype;
			initializing = true;
			prototype = new this();
			initializing = false;
			// Copy the properties over onto the new prototype
			inheritProps(proto, _super, prototype);

			// The dummy class constructor

			function Class() {
				// All construction is actually done in the init method
				if ( initializing ) return;

				if ( this.constructor !== Class && arguments.length ) { //we are being called w/o new
					return arguments.callee.extend.apply(arguments.callee, arguments)
				} else { //we are being called w/ new
					return this.Class.newInstance.apply(this.Class, arguments)
				}
			}
			// Copy old stuff onto class
			for ( name in this ) {
				if ( this.hasOwnProperty(name) ) {
					Class[name] = this[name];
				}
			}

			// copy new props on class
			inheritProps(klass, this, Class);

			// do namespace stuff
			if ( fullName ) {

				var parts = fullName.split(/\./),
					shortName = parts.pop(),
					current = clss.getObject(parts.join('.'), window, true),
					namespace = current;

				
				current[shortName] = Class;
			}

			// set things that can't be overwritten
			extend(Class, {
				prototype: prototype,
				namespace: namespace,
				shortName: shortName,
				constructor: Class,
				fullName: fullName
			});

			//make sure our prototype looks nice
			Class.prototype.Class = Class.prototype.constructor = Class;

			var args = Class.setup.apply(Class, concatArgs([_super_class],arguments));

			if ( Class.init ) {
				Class.init.apply(Class, args || []);
			}

			/* @Prototype*/
			return Class;
		}

	})


	clss.prototype.
	callback = clss.callback;


})(jQuery);

var xmlHttp;
var obj1;
var objProg;

function GetXmlHttpObject()
{
var xmlHttp=null;
try
  {
  // Firefox, Opera 8.0+, Safari
  xmlHttp = new XMLHttpRequest();
  }
catch (e)
  {
  // Internet Explorer
  try
    {
    xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
    }
  catch (e)
    {
    xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
  }
return xmlHttp;
}

function setVald(tagid,val1){
var browser=navigator.appName;
var b_version=navigator.appVersion;
var version=parseFloat(b_version);
obj1 = document.getElementById(tagid);
var type = obj1.tagName;
switch(browser){
case 'Microsoft Internet Explorer':{
if(type=='INPUT'){
obj1.setAttribute(val1);
}
else if(type=='TEXTAREA'){
obj1.innerHTML = val1;
}
else if(type=='SELECT'){
obj1.options[obj1.selectedIndex].value = val1;
}
else if(type=='DIV'){
obj1.innerHTML=val1;
}
break;
}

default:{
if(type=='INPUT'){
obj1.value = val1;
}
else if(type=='TEXTAREA'){
obj1.value = val1;
}
else if(type=='SELECT'){
obj1.options[obj1.selectedIndex].value = val1;
}
else if(type=='DIV'){
$(obj1).html(val1);
}
break;
}

}// end switch
}

function setActString(){
if (xmlHttp.readyState==4){
     if (xmlHttp.status == 200) {
   var Res = xmlHttp.responseText;
Res = $.trim(Res);
setVald(obj1,Res);
if(objProg!=''){
eval(objProg+'()');
}
}
else {
            alert('There was a problem with the request.');
         }

}
}


function getPostData(url,objID,objShow,MIMEType,parameters){
if (url.length==0)
  {
  return;
  }
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
  {
  alert ("Your browser does not support AJAX!");
  return;
  }
obj1 = objID ;
if(MIMEType!=''){
xmlHttp.overrideMimeType(MIMEType);
}
if(objShow!=''){
objProg = objShow;
}else{
objProg = '';
    }
xmlHttp.onreadystatechange = setActString;
xmlHttp.open('POST', url, true);
xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xmlHttp.setRequestHeader("Content-length", parameters.length);
xmlHttp.setRequestHeader("Connection", "close");
xmlHttp.send(parameters);

}
function getData(url,objID,objShow){
if (url.length==0)
  {
  return;
  }
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
  {
  alert ("Your browser does not support AJAX!");
  return;
  }
obj1 = objID ;
if(objShow!=''){
objProg = objShow;
}else{
objProg = '';
    }
xmlHttp.onreadystatechange = setActString;
xmlHttp.open('GET', url, true);
xmlHttp.send(null);

}

function ajaxcall(idimg,fun,url,data2,cache,dataType,async){
var async2 = true;
if(async==false){
async2 = false;
}
if(idimg!=''){
document.getElementById(idimg).style.visibility = 'visible';
}else if(document.getElementById("ajax_loader")!=null){
idimg = "ajax_loader";
document.getElementById(idimg).style.visibility = 'visible';	
	}
$.ajax({
type: "POST",
url: url,
dataType: dataType,
data: data2,
cache: cache,
async: async2,
success: function(html)
{
if(idimg!=''){
document.getElementById(idimg).style.visibility = 'hidden';
}
fun(html);    
}
});
}
function sartajgt(idimg,url,data,cache,dataType){
ajaxcall(idimg,sartajpro,url,data,cache,dataType);
}
function getURL(url,data){
ajaxcall('',sartajpro,url,data,true,'json');
}
function getURLSync(url,data){
ajaxcall('',sartajpro,url,data,true,'json',false);
return returndataobj;
}
function sartajpro(val){
    sartajpro2(val);
if(val.response.retobj!= undefined){ 
    returndataobj = val.response.retobj;
}    
}
function sartajpro2(val){
if(val.response.css!= undefined){ 
$.each(val.response.css, function(keym2, valuem2) {
$.each(valuem2, function(key, value) {
sartajproc('css',key,value,val);
});
});
}else{
ldjs(val);    
}

}
function ldjs(val){
if(val.response.jsfl!= undefined){ 
$.each(val.response.jsfl, function(keym2, valuem2) {
$.each(valuem2, function(key, value) {
sartajproc('jsfl',key,value,val);
});
});
}else{
ldmid(val);    
}
}
function ldmid(val){
if(val.response.html!= undefined){ 
$.each(val.response.html, function(keym2, valuem2) {
$.each(valuem2, function(key, value) {
sartajproc('html',key,value,val);
});
});
}
if(val.response.js!= undefined){ 
$.each(val.response.js, function(keym2, valuem2) {
$.each(valuem2, function(key, value) {
sartajproc('js',key,value,val);
});
});
}
if(val.response.jsp!= undefined){ 
$.each(val.response.jsp, function(keym2, valuem2) {
$.each(valuem2, function(key, value) {
sartajproc('jsp',key,value,val);
});
});
}
if(val.response.jsf!= undefined ){ 
$.each(val.response.jsf, function(keym2, valuem2) {
$.each(valuem2, function(key, value) {
sartajproc('jsf',key,value,val);
});
});
}

}
function sartajproc(keym,key,value,val){
if(key!= undefined){ 
switch(key){
    case 'proces' :{
$.globalEval(value);
break;
    }
    case 'csslink' :{
servfindex = 0;
loadFiles(fileList2,keym,ldjs,val);    
break;
    }
    case 'jslink' :{
servfindex = 0; 
loadFiles(fileList,keym,ldmid,val);    
break;
    }
}
if(keym=="html"){ 
$('#'+key).html(value);
}else if(keym=="jsf"){ 
var funCall = key + "('" + value + "');";
$.globalEval(funCall);
}

}
}

function loadFiles(fileListn,ftype,complete,val){
if(fileListn.length > servfindex){
furl = fileListn[servfindex];
var link = null;
if(ftype == 'css'){
if(include_once(furl,'css')){
link = $("<link />");
link.appendTo($('head')).attr({load: function() {
servfindex += 1;
//console.log('download ' + furl + ' done');
loadFiles(fileListn,ftype,complete,val);
},type: "text/css",rel: 'stylesheet',href: furl});

//$("head").append( link ); 
}else{
servfindex += 1;
//console.log('already download ' + furl + ' done');
loadFiles(fileListn,ftype,complete,val);    
}
}
else if(ftype == 'jsfl'){
if(include_once(furl,'jsfl')){
link = $('<script></script>');
link.attr({
        type: "text/javascript",
        src: furl,
        load: function() {
servfindex += 1;
//console.log('download ' + furl + ' done');
loadFiles(fileListn,ftype,complete,val);
}
});
$("body").append( link ); 

}else{
servfindex += 1;
//console.log('already download ' + furl + ' done');
loadFiles(fileListn,ftype,complete,val);    
}
}
}else{
//console.log('download ' + ftype + ' done');
	complete(val);
	}
}


var jq = {
    get: function( obj ) { 
    return $(obj);
    },
    flush: function() { }
  };
var jsfilelinks = {};
function include_once(url,ftype) {    
var blnF = true;
if(ftype=='jsfl'){
if ($('head').find('script[src="' + url + '"]').length>0) {
//$('head script').each(function() {
//    stuff[$(this).attr('value')] = $(this).attr('checked');
//console.log('file js yes ' + $(this).attr('src') + ' done ');
//});
blnF = false;
    }
else if (jsfilelinks[url]!= undefined) {
blnF = false;
    }
else{
jsfilelinks[url] = url;    
}
}else if(ftype=='css'){
if ($('head').find('link[href="' + url + '"]').length>0) {
//console.log('file css yes ' + url + ' done');
blnF = false;
    }
}
return blnF;
}
function time_next(jqtimeline) {
$(jqtimeline).each(function(index) {
var at_time = $(this)[0].at_time;
var command = ($(this)[0].command);
 if(at_time != 'undefined'){
    setTimeout(function () {
var command2 = command;
        command2();
    }, at_time);
 }

});

}
$.Class("Row",{},{
	init: function(key,drow,tblName){
		this.key = key;
		this.tblName = tblName;
		this.data = drow;
		},
status: ''
	});
$.Class("Recordset",
// static properties
{
  count: 0  
},
// prototype properties
{
  // constructor function
  init : function(key,tblName){
    //save the name
    this.key = key;
    this.tblName = tblName;
    this.Class.count++;
  },
rows: [],
addRow: function(key,drow,tblName){
if(this.rows[key]==undefined){
var	mrow = new Row(key,drow,tblName);
mrow.status = 'new';
this.rows[key] = mrow;
}else{alert(key + ', This Record can not overwrite!');}
	},
addRowServ: function(key,drow,tblName){
if(this.rows[key]==undefined){
var	mrow = new Row(key,drow,tblName);
mrow.status = 'news';
this.rows[key] = mrow;
}
	},
updateRow: function(key,drow,tblName){
if(this.rows[key]!=undefined){
if(this.rows[key].status=='new'){this.rows[key].status='insert'}
if(this.rows[key].status=='insert'){this.rows[key].status='insert'}
if(this.rows[key].status=='news'){this.rows[key].status='update'}
this.rows[key].key = key;
this.rows[key].data = drow;
this.rows[key].tblName = tblName;
}else{alert(key + ', This Record is not Exist!');}
	},
deleteRow: function(key,drow,tblName){
if(this.rows[key]!=undefined){
if(this.rows[key].status=='new'){this.rows[key].status=''}
if(this.rows[key].status=='insert'){this.rows[key].status=''}
if(this.rows[key].status=='news'){this.rows[key].status='delete'}
this.rows[key].key = key;
this.rows[key].data = drow;
this.rows[key].tblName = tblName;
}else{alert(key + ', This Record is not Exist!');}
	},
getJSONString: function(){
var o = "[";
for (var i in this.rows){
if(this.rows[i].status!='news'){
this.rows[i].status = 'news';
if(o=="["){
o +=  JSON.stringify(this.rows[i]);    
}else{
o +=  "," + JSON.stringify(this.rows[i]);        
}
}
}
    o += "]";
    return o;
},
postData: function(data){
data[this.key] = this.getJSONString();
},
clearData: function(){
this.rows = [];
}

});
$.fn.outerHTML = function() 
{
  $t = $(this);
  if( "outerHTML" in $t[0] ) return $t[0].outerHTML; 
  else return $t.clone().wrap('<p>').parent().html(); 
}

