<?= $this->extend("layout/master"); ?>
<?= $this->section("content");?>
<div class="container items-center pt-5" style="height:calc(100vh - 8.2rem)!important;">
<h1 class="content-head text-2xl font-bold	">Welcome to National COVID-19 Vaccination Certification Portal </h1>

<p class="mb-4 mt-4 text-xl">This Portal is Uganda's Official online public COVID-19 Vaccination Certificate Generation and Verification Platform</p>
<p class="mb-4 mt-4 text-xl">
The COVID-19 Vaccination Certificate shall only be generated after the second dose of the vaccine (if you are vaccinated by a two-dose vaccine).
You will be considered fully vaccinated after the second dose of the vaccine and may be able to generate your COVID-19 Vaccination certificate.
<p>
<p class="mb-4 mt-4 text-xl">
Please note that a person is considered vaccinated 14 days after the 2nd dose of the vaccine as the body needs some time to complete the immune response. However, you will receive the certificate from the date of the second dose.
</p>

<p class="mb-4 mt-4 text-xl">

To generate your COVID-19 Vaccination Certificate, submit your National ID Number (NIN). 
A one-time authentication code will be sent to your registered phone number as SMS Text message. Submit the code to generate your certificate. Once generated, you can save the certificate as PDF file or send to your specified email address..  
</p>

<a href="<?= base_url('public/generate');?>" class="btn btn-light btn-lg mt-6 uppercase" tabindex="-1" role="button" aria-disabled="true">Generate my Certificate</a>
</div>
<?=$this->endSection()?>

        
