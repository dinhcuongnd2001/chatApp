function Validator(options) {
  var selectorRules = {};
  // lấy form để thông báo lỗi;
  var formElement = document.querySelector(options.form);

  function validate(inputElement, rule) {
    var errorElement =
      inputElement.parentElement.querySelector(".form-message");
    var errorMessage;
    // lay ra cac rule cua selector
    var rules = selectorRules[rule.selector];

    // lap qua tung rule cua selector & check
    // neu co loi thi dung viec kiem tra
    for (var i = 0; i < rules.length; i++) {
      errorMessage = rules[i](inputElement.value);
      if (errorMessage) break;
    }

    if (errorMessage != undefined) {
      errorElement.innerText = errorMessage;
      inputElement.parentElement.classList.add("invalid");
    } else {
      errorElement.innerText = "";
      inputElement.parentElement.classList.remove("invalid");
    }

    return !errorMessage;
  }

  if (formElement) {
    // lap qua moi rule va xu ly (lang nghe su kien blur, input, ...)
    formElement.onsubmit = function (e) {
      //   e.preventDefault();
      var isFormValid = true;
      options.rules.forEach(function (rule) {
        var inputElement = formElement.querySelector(rule.selector);
        var isValid = validate(inputElement, rule);
        if (!isValid) {
          isFormValid = false;
        }
      });

      if (isFormValid) {
        if (typeof options.onSubmit === "function") {
          var enableInputs = formElement.querySelectorAll("[name]");
          var formValues = Array.from(enableInputs).reduce(function (
            values,
            input
          ) {
            values[input.name] = input.value;
            return values;
          },
          {});

          options.onSubmit(formValues);
        } else {
          formElement.submit();
        }
      }
    };
    options.rules.forEach((rule) => {
      // Lưu lại các Rule cho mỗi input

      if (Array.isArray(selectorRules[rule.selector])) {
        selectorRules[rule.selector].push(rule.test);
      } else {
        selectorRules[rule.selector] = [rule.test];
      }

      var inputElement = formElement.querySelector(rule.selector);
      var errorElement =
        inputElement.parentElement.querySelector(".form-message");

      // Xử lý trường hợp blur ra khỏi input
      inputElement.onblur = function () {
        validate(inputElement, rule);
      };

      // xử lý mỗi khi người dùng nhập vào input

      inputElement.oninput = function () {
        errorElement.innerText = "";
        inputElement.parentElement.classList.remove("invalid");
      };
    });
    // console.log(selectorRules);
  }
}

// các rule

Validator.checkGender = function (selector, message) {
  return {
    selector: selector,
    test: function (value) {
      if (value.toLowerCase() !== "nam" && value.toLowerCase() !== "nữ") {
        return message || "Giá trị bắt buộc phải là Nam hoặc Nữ";
      } else {
        return undefined;
      }
    },
  };
};

Validator.isRequired = function (selector, message) {
  return {
    selector: selector,
    test: function (value) {
      return value.trim() ? undefined : message || "Vui lòng nhập trường này";
    },
  };
};

Validator.isMonth = function (selector, message) {
  return {
    selector: selector,
    test: function (value) {
      month = parseInt(value, 10);
      if (month) {
        if (month < 24 || month > 71) {
          return (
            message ||
            "số tháng tuổi của trẻ phải nằm trong khoảng từ 24 đến 71 tháng"
          );
        }
      } else {
        return message || "Hãy nhập vào kiểu dạng số nguyên";
      }
    },
  };
};

Validator.isWeight = function (selector, message) {
  return {
    selector: selector,
    test: function (value) {
      weight = parseFloat(value);
      if (weight) {
        if (weight < 0 || weight > 40) {
          return (
            message ||
            "Số cân nặng không khả thi, số cân nặng chỉ trong khoảng 40kg"
          );
        }
      } else {
        return message || "Hãy nhập vào kiểu dạng số thực";
      }
    },
  };
};

Validator.isHigh = function (selector, message) {
  return {
    selector: selector,
    test: function (value) {
      high = parseFloat(value);
      if (high) {
        if (high < 0 || high > 150) {
          return (
            message ||
            "Số chiều cao không khả thi, số chiều cao của trẻ trong khoảng 150"
          );
        }
      } else {
        return message || "Hãy nhập vào kiểu dạng số thực";
      }
    },
  };
};
