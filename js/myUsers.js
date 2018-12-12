angular.module('myApp', []).controller('userCtrl', function($scope, $http) {

  // Lấy dữ liệu user từ database
  $http.get("/modules/users.php")
    .then(function(response) {
        // biến model danh sách các user
        $scope.users = response.data.records;
    }, function(response){
      $scope.users = [
        {id:1, fName:'Nguyễn', lName:"Thị Lưu Quỳnh" },
        {id:2, fName:'Trương',  lName:"Trường Hải" },
        {id:3, fName:'Nguyễn',  lName:"Khắc Anh Duy" },
        {id:4, fName:'Kha', lName:"Thiết Giang" },
        {id:5, fName:'Đinh', lName:"Thị Diệu Thúy" },
        {id:6, fName:'Đào',lName:"Nữ Thương" }
      ];
    });

  $scope.fName = ''; 
  $scope.lName = '';
  $scope.passw1 = '';
  $scope.passw2 = '';

  $scope.edit = true; // true nếu chọn Tạo mới
  $scope.error = false; // true nếu passw2s không giống passw1
  $scope.incomplete = false; // true nếu có bất kỳ trường nào chưa nhập (kiểm tra rỗng độ dài bằng 0)
  $scope.hideform = true; // true nếu chọn Tạo mới hoặc Chỉnh Sửa
  $scope.editUser = function(id) {
    $scope.hideform = false;
    if (id == 'new') {
      $scope.edit = true;
      $scope.incomplete = true;
      $scope.fName = '';
      $scope.lName = '';
    } else {
      $scope.edit = false;
      $scope.fName = $scope.users[id-1].fName;
      $scope.lName = $scope.users[id-1].lName; 
    }
  };

  // kiểm tra các biến model
  $scope.$watch('passw1',function() {$scope.test();});
  $scope.$watch('passw2',function() {$scope.test();});
  $scope.$watch('fName', function() {$scope.test();});
  $scope.$watch('lName', function() {$scope.test();});

  // kiểm tra các trường bị lỗi hoặc chưa nhập
  $scope.test = function() {
    if ($scope.passw1 !== $scope.passw2) {
      $scope.error = true;
      } else {
      $scope.error = false;
    }
    $scope.incomplete = false;
    if ($scope.edit && (!$scope.fName.length || !$scope.lName.length || !$scope.passw1.length || !$scope.passw2.length)) {
       $scope.incomplete = true;
    }
  };

});