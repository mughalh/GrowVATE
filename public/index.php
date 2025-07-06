<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../includes/functions.php';
include __DIR__ . '/../includes/header.php';
?>
<section class="text-center mb-5">
<h1 class="display-4">Boost Your Business with Social Media</h1>
<p class="lead">Our platform drives engagement, leads, and sales—fast.</p>
<button class="btn btn-primary btn-lg" onclick="document.getElementById('leadForm').scrollIntoView();">Get Started</button>
</section>

<section id="leadForm" class="w-75 mx-auto">
<form action="submit_lead.php" method="POST" class="row g-3">
<div class="col-md-6"><input name="name" required placeholder="Name" class="form-control"></div>
<div class="col-md-6"><input name="email" type="email" required placeholder="Email" class="form-control"></div>
<div class="col-md-6"><input name="phone" placeholder="Phone" class="form-control"></div>
<div class="col-md-6">
<select name="business_type" required class="form-select">
<option selected disabled>Business Type</option>
<option>Retail</option><option>Services</option><option>Other</option>
</select>
</div>
<div class="col-12">
<textarea name="social_media_goals" placeholder="Social Media Goals" class="form-control"></textarea>
</div>
<div class="col-12 text-center">
<button type="submit" class="btn btn-success">Submit &amp; Get a Call</button>
</div>
</form>
</section>
<?php include __DIR__ . '/../includes/footer.php'; ?>
