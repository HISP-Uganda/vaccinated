<?= $this->extend("layout/master"); ?>
<?= $this->section("content");?>

<?php
    $session = session();
    $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
    $client = $session->client;
    $nin = $session->nin;
    $vaccinations = $session->vaccinations;
?>
<div class=" container justify-center bg-gray-50 py-6 px-4 sm:px-6 lg:px-8 bg-blue-50" style="height:calc(100vh - 8.2rem)!important;">
    <div class="row w-full">
        <div class="md:flex md:justify-end mb-2">
        <button class="btn btn-sm btn-primary no-print object-right" onclick="jQuery.print('#printout')"><i class="bi bi-printer"></i> Print this </button>
        </div>
        <div class="md:flex md:justify-center mb-2">
            <img class="lg:block h-16 w-auto" src="<?php echo base_url('public/assets/images/logo.png'); ?>" alt="Workflow">
        </div>

        <p>This is to Certify that <b><?php echo $client." (".$nin.")" ; ?> </b> was vaccinated against COVID-19 as shown below</p>
    
        <table class="table-auto border">
            <thead>
                <tr>
                <th>Date</th>
                <th>Batch #</th>
                <th>Vaccine Administered</th>
                <th>Dose</th>
                <th>Manufactuerer</th>
                <th>Vaccination Site</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                if(count($vaccinations) > 0){
                    $dose = 1;
                    ?>
                        <tr>
                        <td><?= $vaccinations['dose1']['date']; ?></td>
                        <td><?= $vaccinations['dose1']['batch']; ?></td>
                        <td><?= $vaccinations['dose1']['vaccine']; ?></td>
                        <td><?= $vaccinations['dose1']['dose']; ?></td>
                        <td><?= $vaccinations['dose1']['manufacturer']; ?></td>
                        <td><?= $vaccinations['dose1']['orgUnit']; ?></td>
                        </tr>
                        <tr>
                        <td><?= $vaccinations['dose2']['date']; ?></td>
                        <td><?= $vaccinations['dose2']['batch']; ?></td>
                        <td><?= $vaccinations['dose2']['vaccine']; ?></td>
                        <td><?= $vaccinations['dose2']['dose']; ?></td>
                        <td><?= $vaccinations['dose2']['manufacturer']; ?></td>
                        <td><?= $vaccinations['dose2']['orgUnit']; ?></td>
                        </tr>
                    <?php
                }
            ?>
                
            </tbody>
            </table>
    </div>
    
</div>

<?=$this->endSection()?>

