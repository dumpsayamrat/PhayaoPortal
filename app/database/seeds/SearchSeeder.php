<?php

class SearchSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
       /* Link::rebuildMapping();
        Link::addAllToIndex();*/
        //Link::addAllToIndex();
        Link::reindex();
        Link::rebuildMapping();
        Link::addAllToIndex();
        //Link::putMapping($ignoreConflicts = true);
        /*$r = DB::table('links')->get(array('links.name','links.link'));
        $r->addToIndex();
        Link::rebuildMapping();*/
	    //Link::reindex();
        //Events::reindex();

	}

}
