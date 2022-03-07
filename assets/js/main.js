// 더보기 버튼
const showBtn = document.querySelectorAll('.showBtn');
const flyBtn = document.querySelectorAll('.flyBtn');
const plusBtn = document.querySelectorAll('.plusBtn');
const minusBtn = document.querySelectorAll('.minusBtn');

showBtn.forEach(function(v,k){
  v.addEventListener('click',function(){
    flyBtn[k].classList.toggle('active');
    plusBtn[k].classList.toggle('inactive');
    minusBtn[k].classList.toggle('active');
  });
});

// 뷰타입 변경
const listBtn = document.querySelector('.list');
const gridBtn = document.querySelector('.grid');
const postWrap = document.querySelector('.postWrap ul');

gridBtn.addEventListener('click',function(){
  postWrap.classList.add('grid');
  gridBtn.style.display = 'none';
  listBtn.style.display = 'inline';
});
listBtn.addEventListener('click',function(){
  postWrap.classList.remove('grid');
  listBtn.style.display = 'none';
  gridBtn.style.display = 'inline';
});

// 슬라이드
const list = document.querySelectorAll('.postWrap li')
const slideWrap = document.querySelectorAll('.slideWrap');
const prevBtn = document.querySelectorAll('.prevBtn');
const nextBtn = document.querySelectorAll('.nextBtn');
const nav = document.querySelectorAll('.pagination');

let current = [];
for(let i=0; i<list.length; i++){
  current.push(0);
};
console.log(current);

slideWrap.forEach(function(v,k){
  const slide = v.children;
  v.style.width = `${100*slide.length}%`;
  for(let i=0; i<slide.length; i++){
    $('.pagination').eq(k).append('<span></span>');
  }
});
nav.forEach(function(v,k){
  v.children[0].classList.add('active');
});


nextBtn.forEach(function(v,k){
  v.addEventListener('click',function(){
    if(current[k] < slideWrap[k].children.length-1){
      current[k]++;
      slideWrap[k].style.left = `-${100*current[k]}%`;
      nav[k].children[current[k]].classList.add('active');
      nav[k].children[current[k]-1].classList.remove('active');
    }
  });
});
prevBtn.forEach(function(v,k){
  v.addEventListener('click',function(){
    if(current[k] > 0){
      current[k]--;
      slideWrap[k].style.left = `-${100*current[k]}%`;
      nav[k].children[current[k]].classList.add('active');
      nav[k].children[current[k]+1].classList.remove('active');
    }
  });
});