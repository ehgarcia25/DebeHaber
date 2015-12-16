

@extends('../layouts.master')
@section('title', 'Ventas | DebeHaber')
@section('Title', 'Ventas')

@section('breadcrumbs', Breadcrumbs::render('sales_nav'))

@section('content')
<a class="btn btn-primary btn-lg" href="ventas_form">Crear Venta</a>

<div id="example2_wrapper" class="dataTables_wrapper"><div class="dataTables_length" id="example2_length">
            <div id="example2_filter" class="dataTables_filter">
                <label>Buscar
                    <input type="search" class="" placeholder="" aria-controls="example2">
                </label>
            </div>
            <table id="example2" class="display table dataTable" style="width: 100%;" role="grid" aria-describedby="example2_info">
               <thead>
                    <tr role="row">
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 259px;">Proveedor</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 373px;">Comentario</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 79px;">Tipo</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 173px;">Valor</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 166px;">Moneda</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th rowspan="1" colspan="1">Proveedor</th>
                        <th rowspan="1" colspan="1">Position</th>
                        <th rowspan="1" colspan="1">Age</th>
                        <th rowspan="1" colspan="1">Start Date</th>
                        <th rowspan="1" colspan="1">Salary</th>
                    </tr>
                </tfoot>
            <tbody>
                <tr class="group"><td colspan="5">15 de Octubre del 2015</td></tr><tr role="row" class="odd">
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>61</td>
                        <td>2015/10/15</td>
                        <td>$320,800</td>
                    </tr><tr role="row" class="even">
                        <td>Cedric Kelly</td>
                        <td>Senior Javascript Developer</td>

                        <td>22</td>
                        <td>2015/10/15</td>
                        <td>$433,060</td>
                    </tr><tr role="row" class="odd">
                        <td>Sonya Frost</td>
                        <td>Software Engineer</td>

                        <td>23</td>
                        <td>2015/10/15</td>
                        <td>$103,600</td>
                    </tr><tr role="row" class="even">
                        <td>Quinn Flynn</td>
                        <td>Support Lead</td>

                        <td>22</td>
                        <td>2015/10/15</td>
                        <td>$342,000</td>
                    </tr><tr role="row" class="odd">
                        <td>Dai Rios</td>
                        <td>Personnel Lead</td>

                        <td>35</td>
                        <td>2015/10/15</td>
                        <td>$217,500</td>
                    </tr><tr role="row" class="even">
                        <td>Gavin Joyce</td>
                        <td>Developer</td>

                        <td>42</td>
                        <td>2015/10/15</td>
                        <td>$92,575</td>
                    </tr><tr role="row" class="odd">
                        <td>Martena Mccray</td>
                        <td>Post-Sales support</td>

                        <td>46</td>
                        <td>2015/10/15</td>
                        <td>$324,050</td>
                    </tr><tr role="row" class="even">
                        <td>Jennifer Acosta</td>
                        <td>Junior Javascript Developer</td>

                        <td>43</td>
                        <td>2015/10/15</td>
                        <td>$75,650</td>
                    </tr><tr role="row" class="odd">
                        <td>Shad Decker</td>
                        <td>Regional Director</td>

                        <td>51</td>
                        <td>2015/10/15</td>
                        <td>$183,000</td>
                    </tr><tr class="group"><td colspan="5">16 de Octubre del 2015</td></tr><tr role="row" class="even">
                        <td>Jena Gaines</td>
                        <td>Office Manager</td>

                        <td>30</td>
                        <td>2015/10/16</td>
                        <td>$90,560</td>
                    </tr><tr role="row" class="odd">
                        <td>Haley Kennedy</td>
                        <td>Senior Marketing Designer</td>

                        <td>43</td>
                        <td>2012/12/18</td>
                        <td>$313,500</td>
                    </tr><tr role="row" class="even">
                        <td>Tatyana Fitzpatrick</td>
                        <td>Regional Director</td>

                        <td>19</td>
                        <td>2010/03/17</td>
                        <td>$385,750</td>
                    </tr><tr role="row" class="odd">
                        <td>Michael Silva</td>
                        <td>Marketing Designer</td>

                        <td>66</td>
                        <td>2012/11/27</td>
                        <td>$198,500</td>
                    </tr><tr role="row" class="even">
                        <td>Bradley Greer</td>
                        <td>Software Engineer</td>

                        <td>41</td>
                        <td>2012/10/13</td>
                        <td>$132,000</td>
                    </tr><tr role="row" class="odd">
                        <td>Angelica Ramos</td>
                        <td>Chief Executive Officer (CEO)</td>

                        <td>47</td>
                        <td>2009/10/09</td>
                        <td>$1,200,000</td>
                    </tr><tr role="row" class="even">
                        <td>Suki Burks</td>
                        <td>Developer</td>

                        <td>53</td>
                        <td>2009/10/22</td>
                        <td>$114,500</td>
                    </tr><tr role="row" class="odd">
                        <td>Prescott Bartlett</td>
                        <td>Technical Author</td>

                        <td>27</td>
                        <td>2011/05/07</td>
                        <td>$145,000</td>
                    </tr><tr role="row" class="even">
                        <td>Timothy Mooney</td>
                        <td>Office Manager</td>

                        <td>37</td>
                        <td>2008/12/11</td>
                        <td>$136,200</td>
                    </tr><tr role="row" class="odd">
                        <td>Bruno Nash</td>
                        <td>Software Engineer</td>

                        <td>38</td>
                        <td>2011/05/03</td>
                        <td>$163,500</td>
                    </tr><tr role="row" class="even">
                        <td>Hermione Butler</td>
                        <td>Regional Director</td>

                        <td>47</td>
                        <td>2011/03/21</td>
                        <td>$356,250</td>
                    </tr><tr role="row" class="odd">
                        <td>Lael Greer</td>
                        <td>Systems Administrator</td>

                        <td>21</td>
                        <td>2009/02/27</td>
                        <td>$103,500</td>
                    </tr><tr class="group"><td colspan="5">New York</td></tr><tr role="row" class="even">
                        <td>Brielle Williamson</td>
                        <td>Integration Specialist</td>

                        <td>61</td>
                        <td>2012/12/02</td>
                        <td>$372,000</td>
                    </tr><tr role="row" class="odd">
                        <td>Paul Byrd</td>
                        <td>Chief Financial Officer (CFO)</td>

                        <td>64</td>
                        <td>2010/06/09</td>
                        <td>$725,000</td>
                    </tr><tr role="row" class="even">
                        <td>Gloria Little</td>
                        <td>Systems Administrator</td>

                        <td>59</td>
                        <td>2009/04/10</td>
                        <td>$237,500</td>
                    </tr><tr role="row" class="odd">
                        <td>Jenette Caldwell</td>
                        <td>Development Lead</td>

                        <td>30</td>
                        <td>2011/09/03</td>
                        <td>$345,000</td>
                    </tr></tbody>
           </table>
       </div>
@endsection
