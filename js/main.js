'use strict';

// アニメーション表示
{
  function callback(entries, obs) {
    entries.forEach(entry => {
      if (!entry.isIntersecting) {
        return;
      }

      entry.target.classList.add('appear');
      obs.unobserve(entry.target);
    });
  }

  const options = {
    threshold: 0.2,
  };

  const observer = new IntersectionObserver(callback, options);
  const targets = document.querySelectorAll('.animate');

  targets.forEach(target => {
    observer.observe(target);
  });
}

// ロゴからトップに戻る際のURL末尾に#以降をつけない
{
  const logo = document.querySelector('.logo');
  logo.addEventListener('click', e => {
    e.preventDefault();
    window.scrollTo({
      top: 0,
    });
  });
}

// 「トップに戻る」からトップに戻る際のURL末尾に#以降をつけない
{
  const totop = document.querySelector('.to-top');
  totop.addEventListener('click', e => {
    e.preventDefault();
    window.scrollTo({
      top: 0,
    });
  });
}

// pc-menuから各項目に移る際ののURL末尾に#以降をつけない
{
  const pcmenutop = document.getElementById('pcmenutop');
  pcmenutop.addEventListener('click', e => {
    e.preventDefault();
    window.scrollTo({
      top: 0,
    });
  });
}
{
  const pcmenuprofile = document.getElementById('pcmenuprofile');
  pcmenuprofile.addEventListener('click', e => {
    e.preventDefault();
    window.scrollTo({
      top: 650,
    });
  });
}
{
  const pcmenuportfolio = document.getElementById('pcmenuportfolio');
  pcmenuportfolio.addEventListener('click', e => {
    e.preventDefault();
    window.scrollTo({
        top: 1010,
     });
  });
}
{
  const pcmenuskill = document.getElementById('pcmenuskill');
  pcmenuskill.addEventListener('click', e => {
    e.preventDefault();
    window.scrollTo({
        top: 1240,
     });
  });
}
{
  const pcmenucontact = document.getElementById('pcmenucontact');
  pcmenucontact.addEventListener('click', e => {
    e.preventDefault();
    window.scrollTo({
        top: 1940,
     });
  });
}

// ハンバーガーメニュー
{
  const open = document.getElementById('open');
  const overlay = document.querySelector('.overlay');
  const close = document.getElementById('close');
  const sptoplist =document.getElementById('sptoplist');
  const spprofilelist =document.getElementById('spprofilelist');
  const spportfoliolist =document.getElementById('spportfoliolist');
  const spskilllist =document.getElementById('spskilllist');
  const spcontactlist =document.getElementById('spcontactlist');
  const mychart1 = document.getElementById('myChart1');
  const mychart2 = document.getElementById('myChart2');

  open.addEventListener('click', () => {
    overlay.classList.add('show');
    open.classList.add('hide');
    mychart1.classList.add('bgcolor')
    mychart2.classList.add('bgcolor')
  });

  close.addEventListener('click', () => {
    overlay.classList.remove('show');
    open.classList.remove('hide');
  });

  sptoplist.addEventListener('click', () => {
        overlay.classList.remove('show');
        open.classList.remove('hide');
  });
  spprofilelist.addEventListener('click', () => {
        overlay.classList.remove('show');
        open.classList.remove('hide');
  });
  spportfoliolist.addEventListener('click', () => {
        overlay.classList.remove('show');
        open.classList.remove('hide');
  });
  spskilllist.addEventListener('click', () => {
        overlay.classList.remove('show');
        open.classList.remove('hide');
  });
  spcontactlist.addEventListener('click', () => {
        overlay.classList.remove('show');
        open.classList.remove('hide');
  });

  // sp-menuから各項目に移る際ののURL末尾に#以降をつけない
  sptoplist.addEventListener('click', e => {
    e.preventDefault();
    window.scrollTo({
      top: 0,
    });
  });
  spprofilelist.addEventListener('click', e => {
    e.preventDefault();
    window.scrollTo({
      top: 890,
    });
  });
  spportfoliolist.addEventListener('click', e => {
    e.preventDefault();
    window.scrollTo({
      top: 1200,
    });
  });
  spskilllist.addEventListener('click', e => {
    e.preventDefault();
    window.scrollTo({
      top: 1440,
    });
  });
  spcontactlist.addEventListener('click', e => {
    e.preventDefault();
    window.scrollTo({
      top: 2440,
    });
  });
}