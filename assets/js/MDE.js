(function(){
	var objPublic = {
		DBFieldTypes:{
			'INT':'int',
			 'FLOAT':'float',
			 'DOUBLE':'double',
			 'VARCHAR':'varchar', 
			 'DATE':'date',
			 'TIME':'time',
			 'DATETIME':'datetime',
			 'LONGTEXT':'longtext'
		},
		Init:function(){
			/*$('.TxtName').live('keyup', function(){
				var jThis = $(this);
				var strFieldName = jThis.val().toLowerCase();
				var strType = null;
				if(strFieldName.indexOf('date') != -1){
					strType = 'datetime';
				}else if(strFieldName.indexOf('desc') != -1){
					strType = 'varchar';
				}else if(
					(strFieldName.indexOf('qty') != -1) ||
					(strFieldName.substr(0,2) == 'id')
				){
					strType = 'int';
				}
				if(strType != null){
					var jLstType = $('#' + jThis.attr('data-lst-type'));
					jLstType.val(strType);
					jLstType.selectmenu('refresh', true)
					//jLstType.children(':selected').removeAttr('selected');
					//jLstType.children('[value="' + strType + '"]').attr('selected', 'selected');
				}
			});*/
            $(document).on('mjax-page-load', function(){

            });
		}
		
		
	};
	window.MDE = MDE = objPublic;
	
})();
