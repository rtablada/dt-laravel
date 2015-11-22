<div class="notifications list-block media-list">
  <ul>
    @foreach($errors->all() as $error)
    <li class="notification-item">
      <div class="item-content">
        <div class="item-inner">
          <div class="item-title-row">
            <div class="item-title">Error</div>
            <div class="item-after">
              <a href="#" class="close-notification">
                <span></span>
              </a>
            </div>
          </div>
          <div class="item-text">{{ $error }}</div>
        </div>
      </div>
    </li>
    @endforeach
  </ul>
</div>
