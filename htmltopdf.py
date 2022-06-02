        name = "test1.html"
        try:
            # Upload file to storage
            res = TestHelper.upload_file(name)
            # Convert document to pdf
            res = self.api.get_convert_document_to_pdf(
                name, width=800, height=1000, left_margin=50, right_margin=100, top_margin=150, bottom_margin=200,
                folder=TestHelper.folder, storage=""
            )
            # Move to test folder
            TestHelper.move_file(str(res), TestHelper.test_dst)
        except ApiException as ex:
            print("Exception")
            print("Info: " + str(ex))
            raise ex
