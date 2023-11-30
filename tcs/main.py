import os
import sys
import json
import random
import subprocess


TCS_FILES_PATH = "tcs_files"


class TCSystem:
    def __init__(self, test_cases_path, code_file_path):
        self.test_cases_path = test_cases_path
        self.code_file_path = code_file_path

    def __get_test_cases__(self):
        with open(self.test_cases_path, "r", encoding="utf8") as test_cases_file:
            self.test_cases = json.loads(test_cases_file.read())

    def __create_file__(self):
        self.tcs_token = str(random.randint(1000000, 9999999))

        while self.tcs_token in os.listdir(TCS_FILES_PATH):
            self.tcs_token = str(random.randint(1000000, 9999999))

        self.tcs_file_path = os.path.join(TCS_FILES_PATH, self.tcs_token)

        open(self.tcs_file_path, "w").close()

    def __remove_file__(self):
        os.remove(self.tcs_file_path)

    def __check_test__(self, stdout, timelimit):
        stdin = open(self.tcs_file_path, "r", encoding="utf8")

        process = subprocess.Popen(
            ["python3", self.code_file_path],
            stdin=stdin,
            stdout=subprocess.PIPE
        )

        with process as proc:
            try:
                proc.wait(timeout=timelimit)
                output = process.communicate()[0].decode()

                self.__user_output = output

                return output == stdout

            except subprocess.TimeoutExpired:
                proc.terminate()
                proc.wait()

                return None

    def check(self):
        self.__get_test_cases__()
        self.__create_file__()
        errors = dict()

        for case_num in self.test_cases:
            case = self.test_cases[case_num]

            stdin, stdout, timelimit = case["stdin"], case["stdout"], case["time"]

            with open(self.tcs_file_path, "w", encoding="utf8") as tcs_file:
                tcs_file.write(stdin)

            result = self.__check_test__(stdout, timelimit)

            if not result:
                errors = {
                    "case_num": case_num,
                    "stdin": stdin,
                    "user_output": self.__user_output,
                    "exp_output": stdout,
                    "status": 300 if result is None else 500,
                }

        self.__remove_file__()

        return errors if errors else {"status": 200}


if __name__ == "__main__":
    args = sys.argv
    
    if len(args) > 2:
        filename, testcases = args[1], args[2]

        tcs = TCSystem(
            testcases,
            filename
        )

        print(json.dumps(tcs.check()))
