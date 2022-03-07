// 이미지 선택하면 바로 보여주기
let sel_files = [];

$(document).ready(function(){
  $('#photo').on('change', handleImgFileSelect);
});

function handleImgFileSelect(e){

  // 이미지 정보들을 초기화
  sel_files = [];
  $('#photoZone').empty();

  let files = e.target.files;
  let filesArr = Array.prototype.slice.call(files);

  let index = 0;
  filesArr.forEach(function(f){
    if(!f.type.match('image.*')){
      alert('이미지 파일만 업로드 가능합니다.');
      return;
    }
    sel_files.push(f);

    let reader = new FileReader();
    reader.onload = function(e){
      let html = "<a href=\"javascript:void(0);\" onclick=\"deleteImageAction("+index+")\" id=\"img_id_"+index+"\"><img src=\""+e.target.result+"\" data-file='"+f.name+"' class='selProductFile' title='Click to remove'></a>";
      $('#photoZone').append(html);
      index++;
    }
    reader.readAsDataURL(f);
  })
}

function deleteImageAction(index){
  sel_files.splice(index, 1);

  let img_id = "#img_id_"+index;
  $(img_id).remove();
}

function readURL(input){
  if(input.files && input.files[0]){
    let reader = new FileReader();
    
    reader.onload = function(e){
      let html = `<img src="${e.target.result}" alt="profile" />`;
      $('#profileZone').html(html);
    }
    reader.readAsDataURL(input.files[0]);
  }
}
$('#profile').on('change',function(){
  readURL(this);
});