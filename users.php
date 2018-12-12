<!DOCTYPE html>
<html>
<link rel="stylesheet" href="/css/w3.css">
<script src="/js/angular.min.js"></script>
<body ng-app="myApp" ng-controller="userCtrl">

<div class="w3-container">

  <div style="width:50%; padding:20px; float:left">
    <h3>Users</h3>
    <table class="w3-table w3-bordered w3-striped">
      <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Edit</th>
      </tr>
      <tr ng-repeat="user in users">
        <td>{{ user.fName }}</td>
        <td>{{ user.lName }}</td>
        <td>
          <button class="w3-btn w3-ripple" ng-click="editUser(user.id)">&#9998; Edit</button>
        </td>
      </tr>
    </table>
  </div>
  <div style="width:50%; padding:20px; float:left">
    <form ng-hide="hideform">
      <h3 ng-show="edit">Thêm người dùng:</h3>
      <h3 ng-hide="edit">Sửa người dùng:</h3>
        <label>First Name:</label>
        <input class="w3-input w3-border" type="text" ng-model="fName" ng-disabled="!edit" placeholder="First Name">
      <br>
        <label>Last Name:</label>
        <input class="w3-input w3-border" type="text" ng-model="lName" ng-disabled="!edit" placeholder="Last Name">
      <br>
        <label>Password:</label>
        <input class="w3-input w3-border" type="password" ng-model="passw1" placeholder="Password">
      <br>
        <label>Repeat:</label>
        <input class="w3-input w3-border" type="password" ng-model="passw2" placeholder="Repeat Password">
      <br>
      <button class="w3-btn w3-green w3-ripple" ng-disabled="error || incomplete">&#10004; Lưu lại</button>
    </form>
    
  </div>

</div>
<button class="w3-btn w3-green w3-ripple" ng-click="editUser('new')">&#9998; Tạo người dùng mới</button>

<script src= "/js/myUsers.js"></script>

</body>
</html>