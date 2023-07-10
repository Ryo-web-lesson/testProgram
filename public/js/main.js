document.addEventListener('DOMContentLoaded', () => {
    DropdownMenu.init();
  });
  
  /**
   * ドロップダウンメニュー
   * constructor
   * @param {HTMLElement} elem 開くための要素
   * @property {HTMLElement} button 開くための要素
   * @property {HTMLElement} target 開閉される要素
   * @property {number} contentHeight サブメニューの高さ
   */
  function DropdownMenu(elem) {
    this.button = elem;
    
    const targetId = this.button.dataset.menu;
    this.target = document.getElementById(targetId);
    
    const content = this.target.children[0];
    this.contentHeight = content.clientHeight;
    
    this.handleEvent();
  }
  
  /**
   * イベント登録
   */
  DropdownMenu.prototype.handleEvent = function() {
    // マウスオーバーで開く
    this.button.addEventListener('mouseover', this.open.bind(this));
  
    // クリックで閉じる
    this.button.addEventListener('mouseout', this.close.bind(this));
  };
  
  /**
   * 開く
   */
  DropdownMenu.prototype.open = function() {
    this.target.style.height = this.contentHeight + 'px';
  };
  
  /**
   * 閉じる
   */
  DropdownMenu.prototype.close = function() {
    this.target.style.height = '0';
  };
  
  /**
   * 初期化
   */
  DropdownMenu.init = function() {
    const menus = document.querySelectorAll('[data-menu]');
    menus.forEach(menu => new DropdownMenu(menu));
  };

  $(function () {
    // hoverする要素のclass名
    $(".js-btn").hover(
      function () {
        // hoverした時の処理(classを付与)
        $(".js-box").addClass("js-hover");
      },
      function () {
        // hoverを外した時の処理(classを外す)
        $(".js-box").removeClass("js-hover");
      }
    );
  });

  $(function () {
    // hoverする要素のclass名
    $(".jsbtn").hover(
      function () {
        // hoverした時の処理(classを付与)
        $(".jsbox").addClass("jshover");
      },
      function () {
        // hoverを外した時の処理(classを外す)
        $(".jsbox").removeClass("jshover");
      }
    );
  });