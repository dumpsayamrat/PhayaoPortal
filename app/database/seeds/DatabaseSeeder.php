<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
        DB::table('usercategories')->delete();
        DB::table('majorcategories')->delete();
        DB::table('links')->delete();
        DB::table('middlecategories')->delete();
        DB::table('admins')->delete();
        DB::table('events')->delete();

		$uc = new UserCategories();
        $uc->name = 'ทั่วไป';
        $uc->save();

        $uc1 = new UserCategories();
        $uc1->name = 'บุคคลภายยนอก';
        $uc1->save();

        $mjc = new MajorCategories();
        $mjc->name = 'มหาวิทยาลัย';
        $uc->MajorCategories()->save($mjc);

        $mjc1 = new MajorCategories();
        $mjc1->name = 'สมัครงาน';
        $uc1->MajorCategories()->save($mjc1);

        $mdc = new MiddleCategories();
        $mdc->name ='ติดต่อมหาวิทยาลัย';
        $mjc->MiddleCategories()->save($mdc);

        $mdc1 = new MiddleCategories();
        $mdc1->name ='เอกสารสมัครงาน';
        $mjc1->MiddleCategories()->save($mdc1);

        $l = new Link();
        $l->name = 'ติดต่อมหาวิทยาลัยพะเยา';
        $l->descript = 'ลิ้งค์ติดต่อมหาวิทยาลัยพะเยา';
        $l->link = 'http://www.up.ac.th';
        $mdc->Link()->save($l);

        $l1 = new Link();
        $l1->name = 'เอกสารสมัครงานมหาวิทยาลัยพะเยา';
        $l1->descript = 'รวมเอกสารสมัครงานมหาวิทยาลัยพะเยา';
        $l1->link = 'http://www.up.ac.th/training';
        $mdc1->Link()->save($l1);

	}

}
