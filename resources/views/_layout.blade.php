<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <title>Dog Trainer</title>
  <link rel="stylesheet" href="/css/app.css">
</head>
<body>
  @include('_notifications')

  @yield('content')

  <script src="/js/app.js" charset="utf-8"></script>
</body>
</html>
