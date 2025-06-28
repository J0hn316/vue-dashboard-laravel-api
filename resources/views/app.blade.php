<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Vue Dashboard</title>

  {{-- ✅ Manual Vite Dev Mode --}}
  @verbatim
    <script type="module" src="http://localhost:5173/@vite/client"></script>
  @endverbatim

  {{-- This loads your Vue app's entry file --}}
  <script type="module" src="http://localhost:5173/src/main.js"></script>
</head>
<body class="antialiased">
  {{-- Vue mounts here --}}
  <div id="app"></div>
</body>
</html>
