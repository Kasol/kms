
define(function(require,exports,module){
	var cookie=require("../common/cookie.js");
    var getUser={
		   isInCookie:function(key){
			   if(!cookie.get(key)){
				   return false;
			   }
			   return true;
		   },
		   say:function(){
			   cookie.sayHello();
		   }
   }
   module.exports=getUser;
	
});