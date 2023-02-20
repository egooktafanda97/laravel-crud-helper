<?php

namespace App\Service\Panel;

trait Migrations
{
    private $resource;

    /**
     * @return  table
     *  CETAK FORMAT MIGRASI DARI DATA 
     */
    public  function migration($table)
    {
        /** 
         * AMBIL DATA DARI FUNCTION FILD
         */
        $data = $this->model->fild();
        /** 
         * EXPORT KE GLOBAL VARIABEL
         */
        $this->resource = $data;
        /** 
         * BUAT PRIMARY KEY BIG INCREMENT
         */
        $table->bigIncrements($this->model->primary);
        $table->uuid('uuid')->default(\DB::raw('(UUID())'));
        foreach ($data as $m) {
            /** 
             * AMBIL ITEM MIGRASI PADA DATA
             */
            $migration = $m['migration'];
            if (!empty($migration['size'])) {
                /** 
                 * KONDISI JIKA SIZE TIDAK KOSONG $table->FUNC('NAME',SIZE)->...()
                 */
                $tt = $table->{$migration['type']}($m["name"], $migration['size']);
            } else {
                /** 
                 * KONDISI JIKA SIZE KOSONG $table->FUNC('NAME')->...()
                 */
                $tt = $table->{$migration['type']}($m["name"]);
            }
            /** 
             * MEMBUAT PARAMETER $table->FUNC('NAME')->PARAMETER()
             */
            if (!empty($migration['param'])) {
                /** 
                 * PECAH FORMAT PARAMETER DENGAN PEMISAH `,` EX : unique,nullable
                 */
                $ex = explode(",", $migration['param']);
                if (count($ex) > 0) {
                    foreach ($ex as $x) {
                        /** 
                         * PECAH FORMAT PARAMETER DENGAN PEMISAH `|` UNTUK MENAMBAHKAN DEFAULT PADA PARAMETER 
                         * ex : $table->FUNC('NAME')->PARAMETER(** ARGS **)
                         */
                        $xs = explode("|", $x);
                        if (count($xs) > 1) {
                            $tt->{$xs[0]}($xs[1]);
                        } else {
                            $tt->{$x}();
                        }
                    }
                }
            }

            /** 
             * RELATION SHIP
             */
            if (!empty($m['relation']['foreign'])) {
                /** 
                 * KONDISI
                 */
                if ($m['relation']['foreign']['auto_delete_relation']) {
                    /** 
                     * JIKA AUTO DELETE BERNILAI TRUE
                     */
                    $table->foreign($m["name"])
                        ->references($m['relation']['foreign']['key'])
                        ->on($m['relation']['foreign']['table'])
                        ->onDelete('cascade');
                } else {
                    /** 
                     * JIKA AUTO DELETE BERNILAI FALSE
                     */
                    $table->foreign($m["name"])
                        ->references($m['relation']['foreign']['key'])
                        ->on($m['relation']['foreign']['table']);
                }
            }
        }
    }
    public function getSoftDeletesStatus()
    {
        if (!array_key_exists('softdeletes', $this->resource))
            return false;
        return $this->Init["softdeletes"];
    }
}
