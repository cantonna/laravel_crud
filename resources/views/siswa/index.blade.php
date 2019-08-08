@extends('layouts.master')

@section('content')
@if(session('sukses'))
            <div class="alert alert-success" role="alert">
                {{session('sukses')}}
              </div>
            @endif
            <div class="row">
                <div class='col-4'>
                    <h1>Data Mahasiswa</h1>
                </div>
                <div class='col-4'>
                    <!-- Button -->
<button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#exampleModal">
        Tambah Data Siswa
      </button>

                </div>
                    <table class="table table-hover">
                        <tr>
                            <th>NAMA</th>
                            <th>JENIS KELAMIN</th>
                            <th>AGAMA</th>
                            <th>ALAMAT</th>
                            <th>AKSI</th>
                        </tr>
                        @foreach ($data_siswa as $siswa)
                        <tr>
                        <td>{{$siswa->nama}}</td>
                        <td>{{$siswa->jenis_kelamin}}</td>
                        <td>{{$siswa->agama}}</td>
                        <td>{{$siswa->alamat}}</td>
                        <td>
                          <a href="/siswa/{{$siswa->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                          <a href="/siswa/{{$siswa->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin Akan Menghapus Data Ini?')">Delete</a>
                        </td>
                        </tr>
                        @endforeach 
                    </table>
            </div>
        </div>
      
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                        <form action="/siswa/create" method="POST">
                            {{csrf_field()}}
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Nama</label>
                                  <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="nama">
                                  
                                </div>
                                      <div class="form-group">
                                        <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                                        <select name="jenis_kelamin"class="form-control" id="exampleFormControlSelect1">
                                          <option value="L">Laki-Laki</option>
                                          <option value="P">Perempuan</option>
                                        </select>
                                      </div>
                                      <div class="form-group">
                                            <label for="exampleFormControlSelect1">Agama</label>
                                            <select name="agama"class="form-control" id="exampleFormControlSelect1">
                                              <option>Islam</option>
                                              <option>Kristen</option>
                                              <option>Hindu</option>
                                              <option>Budha</option>
                                              <option>Katholik</option>
                                              <option>Lainnya</option>
                                            </select>
                                          </div>
                                <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Alamat</label>
                                        <textarea name="alamat"class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                      </div>

                              
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                </div>
              </div>
            </div>
          </div>
@endsection