/**
 * Created by 56023_000 on 4/22/2015.
 */

$('#modal_uc').modal('attach events', '#add_uc', 'show');
$('#modal_mjc').modal('attach events', '#add_mjc', 'show');
$('#modal_mdc').modal('attach events', '#add_mdc', 'show');
$('#add_uc,#add_mjc,#add_mdc').click(function(){
    runUc('#uc');
    runMjc('all','#mjc');
    runMdc('all','#mdc');
});


$('#uc,#mjc,#mdc').on('change',function(e){ //When edit categories
    //console.log(e);
    var target=e.currentTarget.id;
    //var at;
    if(target == 'mjc'){  // if edit's target is majorcategories
        var nameC='#user_categories_id';
        runUc(nameC);
        var at;
        $.get('/ajax-majorcategory?mjc_id=all',function(data){
            console.log(data);
            $.each(data,function(index,Odj){
                if(Odj.id == $('#'+target).val() ){
                    at = Odj.user_categories_id;
                    //console.log(at);
                }
            });
            var t3=nameC+' option[value="'+at+'"]';
            $(t3).attr('selected','');

            var t2 ="#up_form_"+target+" input[name='name']";
            var t1 ="#up_form_"+target+" input[name='id']";
            $(t1).val($('#'+target).val());
            var tmp = $('#'+target+' :selected').text().split(" ");//cut #id
            $(t2).val(tmp[0]);
            //$(nameC).val(1);

        });
    }else if(target == 'mdc'){ // if edit's target is middlecategories
        var nameC='#major_categories_id';
        var at;
        runMjc('all',nameC);
        $.get('/ajax-middlecategory?mjc_id=all',function(data){
            $.each(data,function(index,Odj){
                if(Odj.id == $('#'+target).val() ){
                    at = Odj.major_categories_id;
                    //console.log(at);
                }
            });
            var t3=nameC+' option[value="'+at+'"]';
            $(t3).attr('selected','');
            var t2 ="#up_form_"+target+" input[name='name']";
            var t1 ="#up_form_"+target+" input[name='id']";
            $(t1).val($('#'+target).val());
            var tmp =$('#'+target+' :selected').text().split(" ");//cut #id
            $(t2).val(tmp[0]);
            //$(nameC).val(1);

        });
    }else if(target == 'uc'){
        var t2 ="#up_form_"+target+" input[name='name']";
        var t1 ="#up_form_"+target+" input[name='id']";
        $(t1).val($('#'+target).val());
        $(t2).val($('#'+target+' :selected').text());
    }

});


$('#del_form_uc,#del_form_mjc,#del_form_mdc').click(function(e){
    //console.log(e);
    var target=e.currentTarget.id;

    if(target=='del_form_uc'){
        var id =$('#up_form_uc input[name=id]').val();
        var category = 'usercategory';
    }else if(target=='del_form_mjc'){
        var id =$('#up_form_mjc input[name=id]').val();
        var category = 'majorcategory';
    }else if(target=='del_form_mdc'){
        var id =$('#up_form_mdc input[name=id]').val();
        var category = 'middlecategory';
    }

    var host =location.protocol + '//' + location.host;
    var url =host+"/admin/"+category+"/"+id+"/delete";
    //alert(host);
    if (confirm("ต้องการลบสิ่งนี้ใช่หรือไม่")) {
        $.post( url, function() {
            alert( "ลบข้อมูลสำเร็จ" );
            runUc('#uc');
            runMjc('all','#mjc');
            runMdc('all','#mdc');
            runUc('#usercategories');
            runMdc($('#usercategories').val(),'#majorcategories');
            runMdc($('#majorcategories').val(),'#middlecategories');
        })
        //console.log(url);
    }
});

$('#up_form_uc,#up_form_mjc,#up_form_mdc').on('submit',function(e){
    e.preventDefault();

    var category=e.currentTarget.target.value;

    var form = $(this);
    //console.log(form);

    var host =location.protocol + '//' + location.host;
    var url = host+"/admin/"+category+"/"+e.currentTarget.id.value+"/update";
    //alert(url);
    console.log(url);

    $.ajax({
        url:url,
        data: form.serialize(),
        method:'POST',
        beforeSend:function(){
            //$('#load_mjc').addClass('active');
        },
        success:function(){
            runUc('#uc');
            runMjc('all','#mjc');
            runMdc('all','#mdc');
            runUc('#usercategories');
            runMdc($('#usercategories').val(),'#majorcategories');
            runMdc($('#majorcategories').val(),'#middlecategories');

            alert('แก้ไขข้อมูลสำเร็จ');
            //$('#load_mjc').removeClass('active');
            //$('#form_mjc .button').addClass('disabled');
            //$('#modal_mjc .message').removeClass('hidden').append('<p>เพิ่ม '+$('#form_mjc #name').val()+' สำเร็จ</p>');
        }
    });


});




$('#form_uc').on('submit',function(e){
    e.preventDefault();
    var form = $(this);

    var url = form.prop('action')+'?form=form_uc';
    //alert(url);
    $.ajax({
        url:url,
        data: form.serialize(),
        method:'POST',
        beforeSend:function(){
            $('#load_uc').addClass('active');
        },
        success:function(){
            runUc('#usercategories');
            runUc('#uc');
            $('#load_uc').removeClass('active');
            //$('#form_uc .button').addClass('disabled');
            $('#modal_uc .message').removeClass('hidden').append('<p>เพิ่ม '+$('#form_uc #name').val()+' สำเร็จ</p>');
        }
    });
});


$('#form_mjc').on('submit',function(e){
    e.preventDefault();
    var form = $(this);
    var url = form.prop('action')+'?form=form_mjc';
    //alert(url);
    $.ajax({
        url:url,
        data: form.serialize(),
        method:'POST',
        beforeSend:function(){
            $('#load_mjc').addClass('active');
        },
        success:function(){
            runMdc($('#usercategories').val(),'#majorcategories');
            runMjc('all','#mjc');

            $('#load_mjc').removeClass('active');
            //$('#form_mjc .button').addClass('disabled');
            $('#modal_mjc .message').removeClass('hidden').append('<p>เพิ่ม '+$('#form_mjc #name').val()+' สำเร็จ</p>');
        }
    });
});


$('#form_mdc').on('submit',function(e){
    e.preventDefault();
    var form = $(this);
    var url = form.prop('action')+'?form=form_mdc';
    //alert(url);
    $.ajax({
        url:url,
        data: form.serialize(),
        method:'POST',
        beforeSend:function(){
            $('#load_mdc').addClass('active');
        },
        success:function(){
            runMdc($('#majorcategories').val(),'#middlecategories');
            runMdc('all','#mdc');
            $('#load_mdc').removeClass('active');
            //$('#form_mdc .button').addClass('disabled');
            $('#modal_mdc .message').removeClass('hidden').append('<p>เพิ่ม '+$('#form_mdc #name').val()+' สำเร็จ</p>');
        }
    });
});


function runUc(name){
    $.get('/ajax-usercategory',function(data){

        $(name).empty();$('#majorcategories').empty();$('#middlecategories').empty();
        $(name).append('<option value="">เลือก ---</option>');
        $.each(data,function(index,ucOdj){
            $(name).append('<option value="'+ucOdj.id+'">'+ucOdj.name+'  #'+ucOdj.id+'</option>');
        });
    });
}
function runMjc(mjc_id,name){
    $.get('/ajax-majorcategory?mjc_id='+mjc_id,function(data){

        //console.log(data);
        $(name).empty();

        $(name).append('<option value="">เลือก ---</option>');
        $.each(data,function(index,Odj){
            $(name).append('<option value="'+Odj.id+'">'+Odj.name+'  #'+Odj.id+'</option>');
        });
    });
}
function runMdc(mdc_id,name){
    $.get('/ajax-middlecategory?mdc_id='+mdc_id,function(data){
        //console.log(data);
        $(name).empty();
        $(name).append('<option value="">เลือก ---</option>');
        $.each(data,function(index,Odj){
            //console.log('111');
            $(name).append('<option value="'+Odj.id+'">'+Odj.name+'  #'+Odj.id+'</option>');
        });
    });
}

$('#usercategories').on('change',function(e){
    //console.log(e);
    var mjc_id = e.target.value;
    $('#middlecategories').empty();

    //alert(mjc_id);
    //ajax
    runMjc(mjc_id,'#majorcategories');
});
$('#majorcategories').on('change',function(e){
    //console.log(e);
    var mdc_id = e.target.value;
    $('#middlecategories').empty();
    //alert(mdc_id);
    //ajax
    runMdc(mdc_id,'#middlecategories');
});


