(function () {
  var b = document.body;
  document.getElementById('mb').onclick = function () { b.classList.add('open'); };
  document.getElementById('cb').onclick = document.getElementById('scrim').onclick = function () { b.classList.remove('open'); };
  var im = document.querySelectorAll('.sl img');
  if (im.length && !matchMedia('(prefers-reduced-motion:reduce)').matches) {
    var n = 0;
    setInterval(function () { im[n].classList.remove('on'); n = (n + 1) % im.length; im[n].classList.add('on'); }, 4500);
  }
})();
