<!DOCTYPE html>
<html lang="en">
<section class="background-radial-gradient overflow-hidden">
  <style>
    .background-radial-gradient {
      background-color: hsl(218, 41%, 15%);
      background-image: radial-gradient(650px circle at 0% 0%,
          hsl(218, 41%, 35%) 15%,
          hsl(218, 41%, 30%) 35%,
          hsl(218, 41%, 20%) 75%,
          hsl(218, 41%, 19%) 80%,
          transparent 100%),
        radial-gradient(1250px circle at 100% 100%,
          hsl(218, 41%, 45%) 15%,
          hsl(218, 41%, 30%) 35%,
          hsl(218, 41%, 20%) 75%,
          hsl(218, 41%, 19%) 80%,
          transparent 100%);
    }

    #radius-shape-1 {
      height: 220px;
      width: 220px;
      top: -60px;
      left: -130px;
      background: radial-gradient(#44006b, #ad1fff);
      overflow: hidden;
    }

    #radius-shape-2 {
      border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
      bottom: -60px;
      right: -110px;
      width: 300px;
      height: 300px;
      background: radial-gradient(#44006b, #ad1fff);
      overflow: hidden;
    }

    .bg-glass {
      background-color: hsla(0, 0%, 100%, 0.9) !important;
      backdrop-filter: saturate(200%) blur(25px);
    }
    
  </style>
  <br>
  <br>
  <div class="h4 pb-2 mb-4 text-light border-bottom border-light">
  <center><font color="white"><h3> Aboute Book!!</h3></font></center>
  </div>
  <br>
  
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perpustakaan SMKN 1 Maja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>

  <div class="row d-flex justify-content-center">
    <div class="col-md-4"> <!-- Adjust the column size based on your preference -->
      <div class="card mb-4">
        <img src="{{ asset('storage/'.$buku->foto) }}" class="img-thumbnail" alt="image">
        <div class="card-body">
          <table class="table table-striped">
            <tr>
              <th nowrap>Judul Buku:</th>
              <td nowrap>{{$buku->judul}}</td>
            </tr>
            <tr>
              <th nowrap>Penulis:</th>
              <td nowrap>{{$buku->penulis}}</td>
            </tr>
            <tr>
              <th nowrap>Penerbit:</th>
              <td nowrap>{{$buku->penerbit}}</td>
            </tr>
            <tr>
              <th nowrap>Tahun Terbit:</th>
              <td nowrap>{{$buku->tahun_terbit}}</td>
            </tr>
            <tr>
                <th nowrap>Sinopsis :</th>
                <td class="align-top">{{$buku->deskripsi}}</td>
              
            </tr>

          </table>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>