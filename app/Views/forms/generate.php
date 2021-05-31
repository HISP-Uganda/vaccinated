<?= $this->extend("layout/master"); ?>
<?= $this->section("content");?>

<div class=" flex justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8" style="height:calc(100vh - 8.2rem)!important;">
		<div class=" w-2/3 ">
            <form class="w-full" action="<?php echo base_url('public/certificate/retrieve');?>" method="post">
                <div class="items-center w-full w-2/3 px-3 mb-2 md:mb-0">
                    <label class="tracking-wide text-gray-700 text-xs font-bold mb-2" for="nin">
                    <span class="uppercase ">National Identity Number (NIN)</span> <span class="text-red-700 "><?= $validation->getError('nin'); ?>
                    </label>
                    <input class="appearance-none block w-full bg-light text-gray-700 border border-red-500 rounded py-2 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="nin" name="nin" type="text" placeholder="National ID Number" value="<?= set_value('nin', '') ?>">
                    <button class="w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2" type="submit">Generate Certificate</button>
                </div>
        
            </form>
		</div>
	</div>

<?=$this->endSection()?>