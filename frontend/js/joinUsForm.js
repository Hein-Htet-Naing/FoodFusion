const x_mark = document.getElementById('cross');
const join_us_form = document.getElementById('joinUsForm');
const join_btn = document.getElementById('openBtn');


x_mark.onclick = () => {
      join_us_form.classList.remove('block');
      join_us_form.classList.add('hidden');
}
join_btn.onclick = () => {
      join_us_form.classList.remove('hidden');
      join_us_form.classList.add('block');
}