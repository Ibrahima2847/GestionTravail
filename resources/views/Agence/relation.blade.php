
<!DOCTYPE html>
<html>

<head>
    <title>Relation</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src=" https://cdn.jsdelivr.net/npm/axios@1.1.2/dist/axios.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <style>
        html,
        body {
            min-height: 100%;
        }

        body,
        div,
        form,
        input,
        select,
        textarea,
        label,
        p {
            padding: 0;
            margin: 0;
            outline: none;
            font-family: Roboto, Arial, sans-serif;
            font-size: 14px;
            color: #666;
            line-height: 22px;
        }

        h1 {
            position: absolute;
            margin: 0;
            font-size: 40px;
            color: #fff;
            z-index: 2;
            line-height: 83px;
        }

        textarea {
            width: calc(100% - 12px);
            padding: 5px;
        }

        .testbox {
            display: flex;
            justify-content: center;
            align-items: center;
            height: inherit;
            padding: 20px;
        }

        form {
            width: 100%;
            padding: 20px;
            border-radius: 6px;
            background: #fff;
            box-shadow: 0 0 8px #669999;
        }

        .banner {
            position: relative;
            height: 300px;
            background-image: url("/uploads/media/default/0001/02/c1504011491c4e04e5158b63a27a4ea654b03ed1.jpeg");
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .banner::after {
            content: "";
            background-color: rgba(0, 0, 0, 0.2);
            position: absolute;
            width: 100%;
            height: 100%;
        }

        input,
        select,
        textarea {
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input {
            width: calc(100% - 10px);
            padding: 5px;
        }

        input[type="date"] {
            padding: 4px 5px;
        }

        textarea {
            width: calc(100% - 12px);
            padding: 5px;
        }

        .item:hover p,
        .item:hover i,
        .question:hover p,
        .question label:hover,
        input:hover::placeholder {
            color: #669999;
        }

        .item input:hover,
        .item select:hover,
        .item textarea:hover {
            border: 1px solid transparent;
            box-shadow: 0 0 3px 0 #669999;
            color: #669999;
        }

        .item {
            position: relative;
            margin: 10px 0;
        }

        .item span {
            color: red;
        }

        .week {
            display: flex;
            justfiy-content: space-between;
        }

        .colums {
            display: flex;
            justify-content: space-between;
            flex-direction: row;
            flex-wrap: wrap;
        }

        .colums div {
            width: 100%;
        }

        input[type="date"]::-webkit-inner-spin-button {
            display: none;
        }

        .item i,
        input[type="date"]::-webkit-calendar-picker-indicator {
            position: absolute;
            font-size: 20px;
            color: #a3c2c2;
        }

        .item i {
            right: 1%;
            top: 30px;
            z-index: 1;
        }

        input[type=radio],
        input[type=checkbox] {
            display: none;
        }

        label.radio {
            position: relative;
            display: inline-block;
            margin: 5px 20px 15px 0;
            cursor: pointer;
        }

        .question span {
            margin-left: 30px;
        }

        .question-answer label {
            display: block;
        }

        label.radio:before {
            content: "";
            position: absolute;
            left: 0;
            width: 17px;
            height: 17px;
            border-radius: 50%;
            border: 2px solid #ccc;
        }

        input[type=radio]:checked+label:before,
        label.radio:hover:before {
            border: 2px solid #669999;
        }

        label.radio:after {
            content: "";
            position: absolute;
            top: 6px;
            left: 5px;
            width: 8px;
            height: 4px;
            border: 3px solid #669999;
            border-top: none;
            border-right: none;
            transform: rotate(-45deg);
            opacity: 0;
        }

        input[type=radio]:checked+label:after {
            opacity: 1;
        }

        .flax {
            display: flex;
            justify-content: space-around;
        }

        .btn-block {
            margin-top: 10px;
            text-align: center;
        }

        button {
            width: 150px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background: #669999;
            font-size: 16px;
            color: #fff;
            cursor: pointer;
        }

        button:hover {
            background: #a3c2c2;
        }

        @media (min-width: 568px) {

            .name-item,
            .city-item {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
            }

            .name-item input,
            .name-item div {
                width: calc(50% - 20px);
            }

            .name-item div input {
                width: 97%;
            }

            .name-item div label {
                display: block;
                padding-bottom: 5px;
            }
        }
    </style>
</head>

<body>
    <div class="testbox">
        <form action="{{ route('rechercher',$ads->id) }}" method="GET" id="formSearch">
            <div class="banner">
                <h1>Mise en relation</h1>
            </div>
            <div class="colums">
                <div class="item">
                    <div class="input-group">
                        <input type="text" class="form-control" name="words" placeholder="Rechercher un métier">
                        <button type="submit" class="btn btn-primary">Rechercher</button>

                    </div >
                    <div id="results">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Téléphone</th>
                                    <th>Profession</th>
                                    <th>Mettre en relation</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (is_array($annonces) || is_object($annonces))
                                    @foreach ($annonces as $data)
                                        <tr>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->prenom }}</td>
                                            <td>{{ $data->telephone }}</td>
                                            <td>{{ $data->profession }}</td>
                                            <td>
                                                <form action="{{ route('miseRelation', [$ads->id, $data->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    <input type="submit" value="Relation" name="" id="">
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>

